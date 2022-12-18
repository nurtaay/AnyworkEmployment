<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;
use App\Models\Resume;
use App\Models\Tournoment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function confirm(Cart $cart){
        $cart->update([
            'status' => 'confirmed'
        ]);
        return back()->with('message', __('validation.confirm_pro'));
    }

    public function cart(){
        $cart = Cart::where('status', 'ordered')->with(['post', 'user'])->get();
        return view('cart.cart', ['cart' => $cart]);
    }

    public function buy(){
        $sum = 0;
        $prices = Auth::user()->BoughtCart()->where('status', 'in_cart')->get();
        foreach($prices as $q){
            $sum = ($sum + $q->price)*$q->pivot->week;
        }
        if(Auth::user()->wallets()->first()->week >= $sum) {
            $buy = Auth::user()->postswithStatus('in_cart')->allRelatedIds();
            foreach ($buy as $b) {
                Auth::user()->postswithStatus('in_cart')->updateExistingPivot($b, ['status' => 'ordered']);
            }
        }else{
            return back()->with('error', __('messages.no_cash'));
        }
        $new =  Auth::user()->wallets()->first()->week - $sum;
        DB::table('wallets')
            ->where('user_id', Auth::user()->id)
            ->update(['cash' => $new]);

        return back()->with('message', __('validation.buy_cart'));
    }

    public function cartIndex(){
        $x = Auth::user()->postswithStatus('in_cart')->get();
        return view('cart.index', ['cart' => $x]);
    }

    public function deleteCart(Post $post){
        $cart =  Auth::user()->postswithStatus('in_cart')->get();
        if ($cart != null)
            Auth::user()->postswithStatus('in_cart')->detach($post->id);
        return view('cart.index',['cart' => $cart])->with('error', __('validation.delete'));
    }

    public function addCart(Request $request, Post $post){
        $carts = Auth::user()->postswithStatus('in_cart')->where('post_id', $post->id)->first();
        if($carts != null){
            Auth::user()->postswithStatus('in_cart')->updateExistingPivot($post->id,
                [
                    'week' => $carts->pivot->week+$request->input('week'),
                ]);
        }else{
            Auth::user()->postswithStatus('in_cart')->attach($post->id,
                [
                    'week' => $carts->pivot->week+$request->input('week')
                ]);
        }
        return back()->with('message', __('validation.add_cart'));
    }

    public function viewResume(Post $post){
        $resume = $post->postResume()->get();
        return view('posts.otklik_resume', ['resume' => $resume]);
    }
    public function addResume(Request $request, Post $post)
    {
        $post->postResume()->attach($request->resume_id);
        return back();
    }
    public function myFavourites(){
        $fav= Auth::user()->favouritePosts()->get();
        return view('posts.favourites',['posts'=>$fav,'categories'=>Category::all()]);

    }
    public function favourite (Request $request,Post $post){
        $favpost=Auth::user()->favouritePosts()->where('post_id',$post->id)->first();

        if($favpost!=null){
            Auth::user()->favouritePosts()->detach($post->id);
        }
        else{
            Auth::user()->favouritePosts()
                ->attach($post->id);
        }
        return back();
    }
    public function product(Request $request){
        $x = Post::with('category')->get();
        return view('posts.product', ['products' => $x, 'product'=>Post::all()]);
    }

    public function postsByCat(Category $category){
       return view('posts.index',['posts'=>$category->posts,'categories'=>Category::all()]);

    }
    public function  index (){
        $allPosts= Post::all();

        return view('posts.index',['posts'=>$allPosts,'categories'=>Category::all()]);
    }

    public function tindex(){
        $all = Tournoment::all();
        return view('posts.tindex', ['tindex' => $all, 'categories'=>Category::all()]);
    }

    public function  create(){
        return view ('posts.create',['categories'=>Category::all()]);
    }
    public function store(Request $request){
       $validated= $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required|numeric |exists:categories,id'
        ]);

        $fillname = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('posts', $fillname, 'public');
        $validated ['image'] = '/storage/'.$image_path;
        Auth::user()->posts()->create($validated);
        return redirect()->route('posts.index')->with('message','ПОСТ УСПЕШНО СОХРАНЕН !!');
    }
    public function show(Post $post){
        return view('posts.show',['post'=>$post, 'resumes' => Resume::all(), 'categories' => Category::all()]);
    }


    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post,'categories'=>Category::all()]);
    }


    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'category_id'=>$request->category_id,
        ]);

        $fillname = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('posts', $fillname, 'public');
        $validated ['image'] = '/storage/'.$image_path;
        Auth::user()->posts()->update($validated);
        return redirect()->route('posts.product')->with('message','ПОСТ ИЗМЕНЕН');

    }
    public function avatar(Request $request,User $user)
    {

        $validated = $request->validate([
            'avatar' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $fileName = time() . $request->file('avatar')->getClientOriginalName();
        $image_path = $request->file('avatar')->storeAs('posts', $fileName, 'public');
        $user->update([
            'avatar' => '/storage/'.$image_path,
        ]);
        return redirect()->route('user.profile', ['categories'=>Category::all()]) ->with('message','Product Duris Saktaldy');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth.passwords.profile',['user'=>$user, 'categories'=>Category::all()]);
    }

    public function editprofile(User $user){
        return view('posts.editprofile');
    }

    public function updateprofile(Request $request, User $user)
    {
        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
        ]);
        return back();

    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return back();

    }

    public function message_v(Request $request,Post $post){
        $request->validate([
            'message'=>'required|max:255'
        ]);

        Auth::user()->Rposts()->attach($post->id, ['message'=>$request->input('message')]);
        return back();
    }

    public function message(Post $post){
        $otk = $post->Rposts2()->get();
        return view('posts.message',['posts'=>$otk]);
    }
}
