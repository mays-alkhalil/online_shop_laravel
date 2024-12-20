<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{


    
    // عرض النموذج مع البيانات الحالية
    public function edit()
    {
        // جلب بيانات المستخدم ذو ID=3
        $user = auth()->check() ? auth()->user() : User::find(3); // تعيين المستخدم 3 بشكل مبدئي
        
        // التأكد من وجود المستخدم
        if ($user) {
            return view('front.profile', compact('user')); // تمرير البيانات إلى الـ View
        }
        
        // في حالة عدم وجود المستخدم
        return redirect()->route('front.login')->with('error', 'User not found.');
    }

    // تحديث البيانات
    public function update(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . 3, // التحقق من تميز الإيميل مع استثناء الـ ID=3
            'phone' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // جلب بيانات المستخدم ذو ID=3
        $user = User::find(3); 
        
        // التأكد من وجود المستخدم
        if ($user) {
            // تحديث الحقول بناءً على البيانات المدخلة
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->city = $request->input('city');
            $user->address = $request->input('address');
            $user->building = $request->input('building');
            $user->description = $request->input('description');
            
            // حفظ التغييرات في قاعدة البيانات
            $user->save();

            // إعادة التوجيه إلى الصفحة مع رسالة النجاح
            return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
        } else {
            // في حالة لم يتم العثور على المستخدم
            return redirect()->route('front.login')->with('error', 'User not found.');
        }
    } 
}
