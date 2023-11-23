<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    function getHomePage()
    {
        return view("fontPages.home");
    }

    function getBlogListPage()
    {
        return view("fontPages.blogList");
    }
    function getBlogListPageByCategoy($category)
    {
        return view("fontPages.blogList");
    }

    function getblogDetails($id)
    {
        return view("fontPages.blogSinglePage");
    }
}
