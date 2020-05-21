<?php
@session_start();

$home = "Home Page";
$site = "Site Content";
$news = "Manage News";
$products = "Manage Products";
$navigation = "Manage Navigation";
$members = "Members Area";
$admin = "Admin Setting";
$categories = "Categories";


$pages = array(

  array("title" => "Top Banners",

    "table" => "banners",

    //"filter"=>"page_type=''",

    "add" => "yes",

    //"edit" => "no",

    "delete"=>"yes",

    "page" => "banners.php",

    "add_new_button" => "Add Banner",

    "default_orderby_column" => "id",

    //"show" => array("Image"=>"name"),
    "show" => array("Title"=>"title"),
    
    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "top_banner.png",

    "Parent" => "$home"

  ),
  
 array("title" => "Reorder Banners",

    "table" => "banners",

    //"filter"=>"page_type=''",

    "add" => "yes",

    //"edit" => "no",

    "link" => "direct",

    "page" => "reorder_banners.php",

    "icon" => "top_banner.png",

    "Parent" => "$home"

  ),
  
  array("title" => "Home Page Content",

    "link" => "direct",

    "page" => "custom_pages.php?id=1",

    "icon" => "icon17.png",

    "Parent" => "$home"

  ), 
  

  array("title" => "Site Pages",

    "table" => "custom_pages",

    //"filter"=>"page_type=''",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "custom_pages.php",

    "add_new_button" => "Add Page",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"pagetitle"),

    "searchFieldsList" => array("Title"=>"pagetitle"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"pagetitle"),

    "icon" => "icon4.png",

    "Parent" => "$home"

  ),


  array("title" => "Tutes",

    "table" => "posts",

    "filter"=>"recType='blogs'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "tutes.php",

    "add_new_button" => "Add Tutes",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon17.png",

    "Parent" => "$news"

  ),
  
  array("title" => "Events",

    "table" => "posts",

    "filter"=>"recType='events'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "events.php",

    "add_new_button" => "Add Event",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon6.png",

    "Parent" => "$news"

  ),
  
  array("title" => "News",

    "table" => "posts",

    "filter"=>"recType='news'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "news.php",

    "add_new_button" => "Add News",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon12.png",

    "Parent" => "$news"

  ),
  
  array("title" => "Announcements",

    "table" => "posts",

    "filter"=>"recType='announcements'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "announcements.php",

    "add_new_button" => "Add New",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon5.png",

    "Parent" => "$news"

  ),
  

  array("title" => "Archives",

    "table" => "membersArea",

    "filter"=>"recType='archives'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "membersArea.php?recType=archives",

    "add_new_button" => "Add New",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon17.png",

    "Parent" => "$members"

  ),

 array("title" => "Grievances Categories",

    "table" => "membersAreaCategories",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "membersAreaCategories.php",

    "add_new_button" => "Add New",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"catTitle"),

    "searchFieldsList" => array("Title"=>"catTitle"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"catTitle"),

    "icon" => "icon17.png",

    "Parent" => "$members"

  ),
  
  array("title" => "Grievances",

    "table" => "membersArea",

    "filter"=>"recType='grievances'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "membersArea.php?recType=grievances",

    "add_new_button" => "Add New",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon17.png",

    "Parent" => "$members"

  ),


 array("title" => "Legislative Matters",

    "table" => "membersArea",

    "filter"=>"recType='legislative'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "membersArea.php?recType=legislative",

    "add_new_button" => "Add New",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon17.png",

    "Parent" => "$members"

  ),


  array("title" => "Hot Topics",

    "table" => "membersArea",

    "filter"=>"recType='hot'",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "membersArea.php?recType=hot",

    "add_new_button" => "Add New",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "icon17.png",

    "Parent" => "$members"

  ),

  
  array("title" => "Change Password",

    "page" => "changePass.php",

    "link" => "direct",

    "icon" => "icon16.png",

    "Parent" => "$admin"

  ),
  
  array("title" => "Admin Email Address",

    "page" => "changeEmail.php",

    "link" => "direct",

    "icon" => "icon19.png",

    "Parent" => "$admin"

  ),

/*  array("title" => "Products",

    "table" => "products",

    //"filter"=>"page_type=''",

    "add" => "yes",

    "delete"=>"yes",

    "page" => "products.php",

    "add_new_button" => "Add product",

    "default_orderby_column" => "id",

    "show" => array("Title"=>"title"),

    "searchFieldsList" => array("Title"=>"title"),

    "orderFieldsList" => array("ID"=>"id", "Title"=>"title"),

    "icon" => "top_banner.png",

    "Parent" => "$products"

  ),
  
  array("title" => "Reorder Products",

    "table" => "sliderImages",

    //"filter"=>"page_type=''",

    "add" => "yes",

    //"edit" => "no",

    "link" => "direct",

    "page" => "reorder_products.php",

    "icon" => "top_banner.png",

    "Parent" => "$products"

  ),  

  array("title" => "Slider Images",

    "table" => "sliderImages",

    //"filter"=>"page_type=''",

    "add" => "yes",

    //"edit" => "no",

    "delete"=>"yes",

    "page" => "sliderImages.php",

    "add_new_button" => "Add Image",

    "default_orderby_column" => "id",

    "show" => array("Image"=>"name"),

    "icon" => "top_banner.png",

    "Parent" => "$products"

  ),   
  
  array("title" => "Top Navigation",

    "link" => "direct",

    "page" => "topNav.php",

    "icon" => "top_banner.png",

    "Parent" => "$navigation"

  ), 
    
  array("title" => "Bottom Navigation",

    "link" => "direct",

    "page" => "bottomNav.php",

    "icon" => "top_banner.png",

    "Parent" => "$navigation"

  ), 
  
  
 


//  array("title" => "Why Us",

//    "page" => "why_us.php",

//    "link" => "direct",

//    "icon" => "ico_homes.png",

//    "Parent" => "$site"

//  ), */

);

?>
