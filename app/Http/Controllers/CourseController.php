<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        // Get real courses from database
        $courses = Course::all();
        
        // If no courses exist, create sample data for UI testing
        if ($courses->isEmpty()) {
            $courses = collect([
                (object)['id' => 1, 'name' => 'Ethical Hacking Fundamentals', 'description' => 'Learn the basics of ethical hacking and penetration testing from industry experts.', 'duration' => 6, 'fees' => 5999, 'modules' => 12],
                (object)['id' => 2, 'name' => 'Network Security Expert', 'description' => 'Master network security concepts, firewalls, and advanced protection strategies.', 'duration' => 8, 'fees' => 7999, 'modules' => 15],
                (object)['id' => 3, 'name' => 'Application Security Pro', 'description' => 'Deep dive into secure coding practices and application vulnerability testing.', 'duration' => 10, 'fees' => 9999, 'modules' => 18],
                (object)['id' => 4, 'name' => 'Cloud Security Fundamentals', 'description' => 'Secure your cloud infrastructure with industry best practices and compliance standards.', 'duration' => 7, 'fees' => 6999, 'modules' => 14],
                (object)['id' => 5, 'name' => 'Web Application Security', 'description' => 'Master OWASP top 10 vulnerabilities and secure web development practices.', 'duration' => 9, 'fees' => 8499, 'modules' => 16],
            ]);
        }
        
        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('courses.create');
    }

    public function store()
    {
        // Add course creation logic
    }

    public function edit(Course $course): View
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Course $course)
    {
        // Add course update logic
    }

    public function destroy(Course $course)
    {
        // Add course delete logic
    }
}