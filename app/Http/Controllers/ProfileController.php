<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        // جلب بيانات المستخدم الحالي المسجل
        $user = auth()->user();
        
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
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(), // التحقق من الـ email للمستخدم الحالي
            'phone' => 'nullable|string|max:15',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // جلب بيانات المستخدم الحالي
        $user = auth()->user();
        
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

