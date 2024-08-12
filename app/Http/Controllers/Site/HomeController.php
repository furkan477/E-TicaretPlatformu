<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use App\Models\UserAdress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->category_id)) {
            $products = Product::where('status', '0')->with('category')->get();
        } else {
            $categories = Category::findOrFail($request->category_id);
            $categoryIds = getAllCategoryIds($categories);
            $products = Product::where('status', '0')->whereIn('category_id', $categoryIds)->with('category')->get();
        }
        $categories = Category::where("cat_ust", 0)->with("underCategory")->get();
        Categories();

        return view("site.pages.index", compact("categories", "products"));
    }

    public function profile(User $user)
    {
        return view("site.pages.profile", compact("user"));
    }

    public function Contact()
    {
        $user = Auth::user();
        return view("site.pages.contact", compact("user"));
    }

    public function ContactCreate(ContactRequest $request)
    {

        Contact::create([
            "user_id" => Auth::id(),
            "subject" => $request->subject,
            "message" => $request->message,
        ]);

        return back()->withSuccess("Yardım Talebiniz Başarılı Bir Şekilde Gönderilmiştir En kısa Zamanda dönüş yapcağız");

    }

    public function Address(AddressRequest $request)
    {
        UserAdress::create([
            "user_id" => Auth::id(),
            "address_line1" => $request->address_line1,
            "address_line2" => $request->address_line2 ?? null,
            "city" => $request->city,
            "country" => $request->country,
            "posta_code" => $request->posta_code,
            "status" => '0',
        ]);

        return back()->withSuccess("Adres Ekleme İşleminiz Başarılı !");
    }

    public function AddressUpdate(AddressRequest $request)
    {

        UserAdress::where('user_id', Auth::id())->update($request->validated());
        return back()->withSuccess('Adres Güncelleme İşlemi Başarılıdır.');
    }

    public function AddressDelete(UserAdress $address)
    {
        if (Auth::id() == $address->user_id) {
            $address->delete();
            return back()->withSuccess('Adresiniz Başarılı Bir Şekilde Silinmiştir , Yeni Adresinizi Giriniz');
        }

        return redirect('/login');
    }
}
