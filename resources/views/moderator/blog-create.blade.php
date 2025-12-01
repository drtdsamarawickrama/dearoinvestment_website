<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.theme')
    @include('layouts.header-admin')
    <title>New Article - Dearo Admin</title>
</head>
<body class="font-lato h-screen bg-white flex flex-col">
    <!-- Navigation -->
    <header class="w-full flex flex-col z-50">
        <div class="h-12 max-h-12 bg-theme-blue lg:hidden flex justify-end items-center px-4 z-20">
            <ion-icon onclick="onToggleMenu(this);" class="text-3xl text-white cursor-pointer" name="menu"></ion-icon>
        </div>
        <div  id="desktop-header-2" class="h-12 w-full bg-theme-blue menu-holder-2 hidden lg:flex justify-start">
            <nav class="w-full flex items-center justify-start sm:max-w-screen-2xl mx-auto">
                <div class="nav-links-2 absolute md:static mt-0 text-white bg-theme-blue md:bg-transparent min-h-fit w-full md:w-auto left-0 top-[-100%] flex items-center sm:px-20">
                    <ul class="flex flex-col md:flex-row md:items-center gap-8 md:gap-[2vw] text-md font-bold">
                        <li class="w-auto h-full  {{ Route::is('admin-blogs-list-load')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="pr-4 py-2" href="{{ route('admin-blogs-list-load') }}">All Articles</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::is('admin-blogs-new-load')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <a class="px-4 py-2" href="{{ route('admin-blogs-new-load') }}" >New Article</a>
                        </li>
                        <li class="w-auto h-full  {{ Route::is('dearo.loan.*')? 'border-b-[1px]':'' }} border-white hover:border-b-[1px]">
                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="px-4 py-2">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="w-full h-auto mb-auto">

        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            @if(isset($blog))
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Update <span class="text-theme-orange">Blog</span></h3>
            @else
            <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left">Create a <span class="text-theme-orange">New Article</span></h3>
            @endif
            <!-- <p class="text-theme-gray text-md font-normal text-left w-full mt-6">Dearo Holdings has strategically diversified into key economic growth sectors across financial services, leisure, agriculture and plantations, construction and real estate, manufacturing and trading, technology, research and innovation and strategic investments.</p> -->
        </div>

        <!-- Section: Create/Update-Start -->
        @if(!isset($blog))
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <div class="mt-6 w-full bg-theme-blue-lite rounded-lg px-4 md:px-8 py-2">
                <h6 class="text-theme-gray text-2xl font-bold text-left mt-4">Create a New Article</h6>
                <form action="{{ route('admin-blog-create') }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="title" class="text-theme-gray">Title</label>
                            <input type="text" id="title" name="title" class="mt-1 border-theme-gray-lite w-full"/>
                            @if($errors->has('title')) <div class="text-red-600 text-sm">{{ $errors->first('title') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="sub_title" class="text-theme-gray">Sub Title</label>
                            <input type="text" id="sub_title" name="sub_title" class="mt-1 border-theme-gray-lite w-full"/>
                            @if($errors->has('sub_title')) <div class="text-red-600 text-sm">{{ $errors->first('sub_title') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="meta_description" class="text-theme-gray">Meta Description</label>
                            <input type="text" id="meta_description" name="meta_description" class="mt-1 border-theme-gray-lite w-full"/>
                            @if($errors->has('meta_description')) <div class="text-red-600 text-sm">{{ $errors->first('meta_description') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="article_type" class="text-theme-gray">Article Type</label>
                            <select name="article_type" id="article_type" class="mt-1 border-theme-gray-lite w-full">
                                <option value="GENERAL_ARTICLE">General Article</option>
                                <option value="ANNUAL_REPORT">Annual Report</option>
                                <option value="QUARTERLY_REPORT">Quarterly Report</option>
                            </select>
                            @if($errors->has('article_type')) <div class="text-red-600 text-sm">{{ $errors->first('article_type') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="og_image" class="text-theme-gray">Meta Image</label>
                            <input type="file" id="og_image" name="og_image" class="mt-1 border-theme-gray-lite w-full"/>
                            @if($errors->has('og_image')) <div class="text-red-600 text-sm">{{ $errors->first('og_image') }}</div> @endif
                        </div>
                        <div class="w-full mt-2 flex justify-end">
                            <button class="bg-theme-blue text-white font-bold px-4 py-2">Create Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @else
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
            <div class="mt-6 w-full bg-theme-blue-lite rounded-lg px-4 md:px-8 py-2">
                <h6 class="text-theme-gray text-2xl font-bold text-left mt-4">Update Article</h6>
                <form action="{{ route('admin-blog-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="title" class="text-theme-gray">Title</label>
                            <input type="text" id="title" name="title" class="mt-1 border-theme-gray-lite w-full" value="{{ $blog->title }}"/>
                            @if($errors->has('title')) <div class="text-red-600 text-sm">{{ $errors->first('title') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="sub_title" class="text-theme-gray">Sub Title</label>
                            <input type="text" id="sub_title" name="sub_title" class="mt-1 border-theme-gray-lite w-full" value="{{ $blog->sub_title }}"/>
                            @if($errors->has('sub_title')) <div class="text-red-600 text-sm">{{ $errors->first('sub_title') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="meta_description" class="text-theme-gray">Meta Description</label>
                            <input type="text" id="meta_description" name="meta_description" class="mt-1 border-theme-gray-lite w-full" value="{{ $blog->meta_description }}"/>
                            @if($errors->has('meta_description')) <div class="text-red-600 text-sm">{{ $errors->first('meta_description') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="article_type" class="text-theme-gray">Article Type</label>
                            <select name="article_type" id="article_type" class="mt-1 border-theme-gray-lite w-full">
                                @if($blog->article_type == 'GENERAL_ARTICLE') <option value="GENERAL_ARTICLE" selected>General Article</option> @else <option value="GENERAL_ARTICLE" >General Article</option> @endif
                                @if($blog->article_type == 'ANNUAL_REPORT') <option value="ANNUAL_REPORT" selected>Annual Report</option> @else <option value="ANNUAL_REPORT">Annual Report</option> @endif
                                @if($blog->article_type == 'QUARTERLY_REPORT') <option value="QUARTERLY_REPORT" selected>Quarterly Report</option> @else <option value="QUARTERLY_REPORT">Quarterly Report</option> @endif
                            </select>
                            @if($errors->has('article_type')) <div class="text-red-600 text-sm">{{ $errors->first('article_type') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="article_status" class="text-theme-gray">Article Status</label>
                            <select name="article_status" id="article_status" class="mt-1 border-theme-gray-lite w-full">
                                @if($blog->status == 'DRAFT') <option value="DRAFT" selected>Draft</option> @else <option value="DRAFT" >Draft</option> @endif
                                @if($blog->status == 'COMPLETED') <option value="COMPLETED" selected>Completed</option> @else <option value="COMPLETED">Completed</option> @endif
                                @if($blog->status == 'PUBLISHED') <option value="PUBLISHED" selected>Published</option> @else <option value="PUBLISHED">Published</option> @endif
                            </select>
                            @if($errors->has('article_status')) <div class="text-red-600 text-sm">{{ $errors->first('article_status') }}</div> @endif
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="og_image" class="text-theme-gray">Meta Image</label>
                            <input type="file" id="og_image" name="og_image" class="mt-1 border-theme-gray-lite w-full" />
                            @if($errors->has('og_image')) <div class="text-red-600 text-sm">{{ $errors->first('og_image') }}</div> @endif
                        </div>
                        <div class="w-full mt-2 flex justify-end">
                            <button class="bg-theme-blue text-white font-bold px-4 py-2">Update Article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <!-- Section: Create/Update-End -->

        <!-- Section: Content Add-Start -->
        @if(isset($blog))
        <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20 flex flex-wrap items-center gap-4">
            <button id="btn-show-add-title" class="bg-theme-orange-ribbon text-theme-blue font-bold px-4 py-2">Title</button>
            <button id="btn-show-add-para" class="bg-theme-orange-ribbon text-theme-blue font-bold px-4 py-2">Paragraph</button>
            <button id="btn-show-add-list-bulleted" class="bg-theme-orange-ribbon text-theme-blue font-bold px-4 py-2">List Bulleted</button>
            <button id="btn-show-add-list-numbered" class="bg-theme-orange-ribbon text-theme-blue font-bold px-4 py-2">List Numbered</button>
            <button id="btn-show-add-image" class="bg-theme-orange-ribbon text-theme-blue font-bold px-4 py-2">Image</button>
            <button id="btn-show-add-pdf" class="bg-theme-orange-ribbon text-theme-blue font-bold px-4 py-2">PDF</button>
        </div>
        <div id="div-create-content" class="w-full bg-theme-orange-lite py-10 ">
            <!-- Add: Title -->
            <div id="div-form-add-title" class="div-form-add-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Create Title</h6>
                <form action="{{ route('admin-blog-content-create', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_type" name="content_type" value="TITLE">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="title" class="text-theme-gray">Title</label>
                            <input type="text" id="title" name="title" class="mt-1 border-theme-gray-lite w-full" value=""/>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add Title</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Add: Para -->
            <div id="div-form-add-para" class="div-form-add-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Create Para</h6>
                <form action="{{ route('admin-blog-content-create', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_type" name="content_type" value="PARAGRAPH">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="para" class="text-theme-gray">Paragraph</label>
                            <textarea type="text" id="para" name="para" class="mt-1 border-theme-gray-lite w-full"></textarea>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add Para</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Add: List Bulleted -->
            <div id="div-form-add-list-bulleted" class="div-form-add-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Create List Bulleted</h6>
                <form action="{{ route('admin-blog-content-create', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_type" name="content_type" value="LIST_BULLETS">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="list_bulleted" class="text-theme-gray">List (Add each item in a new line)</label>
                            <textarea type="text" id="list_bulleted" name="list_bulleted" class="mt-1 border-theme-gray-lite w-full"></textarea>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add List Bulleted</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Add: List Numbered -->
            <div id="div-form-add-list-numbered" class="div-form-add-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Create List Numbered</h6>
                <form action="{{ route('admin-blog-content-create', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_type" name="content_type" value="LIST_NUMBERED">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="list_numbered" class="text-theme-gray">List (Add each item in a new line)</label>
                            <textarea type="text" id="list_numbered" name="list_numbered" class="mt-1 border-theme-gray-lite w-full"></textarea>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add List Numbered</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Add: Image -->
            <div id="div-form-add-image" class="div-form-add-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Create Image</h6>
                <form action="{{ route('admin-blog-content-create', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_type" name="content_type" value="IMAGE">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="image_title" class="text-theme-gray">Image Title</label>
                            <input type="text" id="image_title" name="image_title" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="image_file" class="text-theme-gray">Image File</label>
                            <input type="file" id="image_file" name="image_file" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add Image</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Add: PDF -->
            <div id="div-form-add-pdf" class="div-form-add-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Add PDF</h6>
                <form action="{{ route('admin-blog-content-create', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_type" name="content_type" value="PDF">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="pdf_title" class="text-theme-gray">PDF Title</label>
                            <input type="text" id="pdf_title" name="pdf_title" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="pdf_file" class="text-theme-gray">PDF File</label>
                            <input type="file" id="pdf_file" name="pdf_file" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Add PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div id="div-edit-content" class="w-full bg-theme-orange-lite py-10 hidden">
            <!-- Edit: Title -->
            <div id="div-form-edit-title" class="div-form-edit-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Edit Title</h6>
                <form action="{{ route('admin-blog-content-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_id" name="content_id" value="">
                    <input type="hidden" id="content_type" name="content_type" value="TITLE">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="title" class="text-theme-gray">Title</label>
                            <input type="text" id="title" name="title" class="mt-1 border-theme-gray-lite w-full" value=""/>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button type="submit" class="h-min bg-theme-blue text-white font-bold px-4 py-2">Update Title</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit: Para -->
            <div id="div-form-edit-para" class="div-form-edit-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Edit Para</h6>
                <form action="{{ route('admin-blog-content-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_id" name="content_id" value="">
                    <input type="hidden" id="content_type" name="content_type" value="PARAGRAPH">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="para" class="text-theme-gray">Paragraph</label>
                            <textarea type="text" id="para" name="para" class="mt-1 border-theme-gray-lite w-full"></textarea>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Update Para</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit: List Bulleted -->
            <div id="div-form-edit-list-bulleted" class="div-form-edit-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Edit List Bulleted</h6>
                <form action="{{ route('admin-blog-content-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_id" name="content_id" value="">
                    <input type="hidden" id="content_type" name="content_type" value="LIST_BULLETS">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="list_bulleted" class="text-theme-gray">List (Add each item in a new line)</label>
                            <textarea type="text" id="list_bulleted" name="list_bulleted" class="mt-1 border-theme-gray-lite w-full"></textarea>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Update List Bulleted</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit: List Numbered -->
            <div id="div-form-edit-list-numbered" class="div-form-edit-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Edit List Numbered</h6>
                <form action="{{ route('admin-blog-content-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_id" name="content_id" value="">
                    <input type="hidden" id="content_type" name="content_type" value="LIST_NUMBERED">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="list_numbered" class="text-theme-gray">List (Add each item in a new line)</label>
                            <textarea type="text" id="list_numbered" name="list_numbered" class="mt-1 border-theme-gray-lite w-full"></textarea>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Update List Numbered</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit: Image -->
            <div id="div-form-edit-image" class="div-form-edit-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Edit Image</h6>
                <form action="{{ route('admin-blog-content-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_id" name="content_id" value="">
                    <input type="hidden" id="content_type" name="content_type" value="IMAGE">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="image_title" class="text-theme-gray">Image Title</label>
                            <input type="text" id="image_title" name="image_title" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="image_file" class="text-theme-gray">Image File</label>
                            <input type="file" id="image_file" name="image_file" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Update Image</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit: PDF -->
            <div id="div-form-edit-pdf" class="div-form-edit-content w-full sm:max-w-screen-2xl mx-auto px-4 sm:px-10 md:px-20 hidden">
                <h6 class="text-theme-blue text-2xl font-bold text-left">Edit PDF</h6>
                <form action="{{ route('admin-blog-content-update', ['blog_id' => $blog->id]) }}" method="post" class="w-full" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blog_id" name="blog_id" value="{{ $blog->id }}">
                    <input type="hidden" id="content_id" name="content_id" value="">
                    <input type="hidden" id="content_type" name="content_type" value="PDF">
                    <div class="mt-4 w-full flex flex-wrap gap-x-4 gap-y-2 justify-between items-end">
                        <div class="w-full md:w-[48%] text-md">
                            <label for="pdf_title" class="text-theme-gray">PDF Title</label>
                            <input type="text" id="pdf_title" name="pdf_title" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] text-md">
                            <label for="pdf_file" class="text-theme-gray">PDF File</label>
                            <input type="file" id="pdf_file" name="pdf_file" class="mt-1 border-theme-gray-lite w-full" value="" required/>
                        </div>
                        <div class="w-full md:w-[48%] flex justify-start">
                            <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">Update PDF</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <!-- Section: Content Add-End -->

        <!-- Section: Render Contents-Start -->
        @if(isset($contents))
            <div class="w-full sm:max-w-screen-2xl mx-auto mt-10 px-4 sm:px-10 md:px-20">
                @if(isset($blog))
                    <h3 class="text-theme-blue text-3xl sm:text-4xl font-bold text-left"><span class="text-theme-orange drop-shadow-md shadow-theme-blue">{{ $blog->title }}</span></h3>
                @endif

                <div class="mt-6 w-full">
                @foreach($contents as $contentElement)
                    @php
                        $contentObject = json_decode($contentElement->content)
                    @endphp

                    @switch($contentElement->content_type)
                        @case("TITLE")
                            <h6 class="text-theme-blue text-2xl font-bold text-left my-3">{{ $contentObject->title }}</h6>
                            <div class="flex items-center mb-6">
                                <form action="" method="POST" class="form-title-data-holder p-0 m-0">
                                    @csrf
                                    <input type="hidden" id="element_id" name="element_id" value="{{ $contentElement->id }}">
                                    <input type="hidden" id="content_json" name="content_json" value="{{ $contentElement->content }}">
                                    <button type="submit" class="w-8 h-8 ml-2"><ion-icon name="create" class="text-theme-blue text-3xl"></ion-icon></button>
                                </form>
                                <a href="{{ route('admin-blog-content-moveup',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-up-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-movedown',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-down-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-delete',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="trash" class="text-theme-blue text-2xl"></ion-icon></a>
                            </div>
                            @break

                        @case("PARAGRAPH")
                            <p class="text-theme-gray text-md font-normal text-left w-full my-2">{{ $contentObject->paragraph }}</p>
                            <div class="flex items-center mb-6">
                                <form action="" method="POST" class="form-para-data-holder p-0 m-0">
                                    @csrf
                                    <input type="hidden" id="element_id" name="element_id" value="{{ $contentElement->id }}">
                                    <input type="hidden" id="content_json" name="content_json" value="{{ $contentElement->content }}">
                                    <button type="submit" class="w-8 h-8 ml-2"><ion-icon name="create" class="text-theme-blue text-3xl"></ion-icon></button>
                                </form>
                                <a href="{{ route('admin-blog-content-moveup',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-up-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-movedown',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-down-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-delete',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="trash" class="text-theme-blue text-2xl"></ion-icon></a>
                            </div>
                            @break

                        @case("LIST_BULLETS")
                            <ul class="text-theme-gray text-md font-normal text-left w-full list-disc ml-4 my-3">
                                @foreach($contentObject->list_items as $listItem)
                                    <li>{{ $listItem }}</li>
                                @endforeach
                            </ul>
                            <div class="flex items-center mb-6">
                                <form action="" method="POST" class="form-list-bullet-data-holder p-0 m-0">
                                    @csrf
                                    <input type="hidden" id="element_id" name="element_id" value="{{ $contentElement->id }}">
                                    <input type="hidden" id="content_json" name="content_json" value="{{ $contentElement->content }}">
                                    <button type="submit" class="w-8 h-8 ml-2"><ion-icon name="create" class="text-theme-blue text-3xl"></ion-icon></button>
                                </form>
                                <a href="{{ route('admin-blog-content-moveup',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-up-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-movedown',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-down-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-delete',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="trash" class="text-theme-blue text-2xl"></ion-icon></a>
                            </div>
                            @break

                        @case("LIST_NUMBERED")
                            <ol class="text-theme-gray text-md font-normal text-left w-full mt-2 ml-4 list-decimal my-3">
                                @foreach($contentObject->list_items as $listItem)
                                    <li>{{ $listItem }}</li>
                                @endforeach
                            </ol>
                            <div class="flex items-center mb-6">
                                <form action="" method="POST" class="form-list-numbered-data-holder p-0 m-0">
                                    @csrf
                                    <input type="hidden" id="element_id" name="element_id" value="{{ $contentElement->id }}">
                                    <input type="hidden" id="content_json" name="content_json" value="{{ $contentElement->content }}">
                                    <button type="submit" class="w-8 h-8 ml-2"><ion-icon name="create" class="text-theme-blue text-3xl"></ion-icon></button>
                                </form>
                                <a href="{{ route('admin-blog-content-moveup',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-up-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-movedown',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-down-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-delete',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="trash" class="text-theme-blue text-2xl"></ion-icon></a>
                            </div>
                            @break

                        @case("IMAGE")
                            <div class="flex flex-col max-w-fit my-3 border-2 border-theme-blue-lite">
                                <img src="{{ url('/') }}/uploads/blog/{{ $contentObject->image }}" alt="{{ $contentObject->title }}" class="w-full h-auto border-theme-blue-lite object-contain">
                                <span class="text-center bg-theme-blue-lite py-1">{{ $contentObject->title }}</span>
                            </div>
                            <div class="flex items-center mb-6">
                                <form action="" method="POST" class="form-image-data-holder p-0 m-0">
                                    @csrf
                                    <input type="hidden" id="element_id" name="element_id" value="{{ $contentElement->id }}">
                                    <input type="hidden" id="content_json" name="content_json" value="{{ $contentElement->content }}">
                                    <button type="submit" class="w-8 h-8 ml-2"><ion-icon name="create" class="text-theme-blue text-3xl"></ion-icon></button>
                                </form>
                                <a href="{{ route('admin-blog-content-moveup',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-up-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-movedown',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-down-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-delete',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="trash" class="text-theme-blue text-2xl"></ion-icon></a>
                            </div>
                            @break

                        @case("PDF")
                            <a target="_blank" href="{{ url('/') }}/uploads/pdf/{{ $contentObject->pdf }}" class="my-2">
                                <button class="h-min bg-theme-blue text-white font-bold px-4 py-2">{{ $contentObject->title }}</button>
                            </a>
                            <div class="flex items-center mb-6">
                                <form action="" method="POST" class="form-pdf-data-holder p-0 m-0">
                                    @csrf
                                    <input type="hidden" id="element_id" name="element_id" value="{{ $contentElement->id }}">
                                    <input type="hidden" id="content_json" name="content_json" value="{{ $contentElement->content }}">
                                    <button type="submit" class="w-8 h-8 ml-2"><ion-icon name="create" class="text-theme-blue text-3xl"></ion-icon></button>
                                </form>
                                <a href="{{ route('admin-blog-content-moveup',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-up-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-movedown',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="arrow-down-circle" class="text-theme-blue text-3xl"></ion-icon></a>
                                <a href="{{ route('admin-blog-content-delete',['blog_id' => $blog->id, 'content_id' => $contentElement->id]) }}"><ion-icon name="trash" class="text-theme-blue text-2xl"></ion-icon></a>
                            </div>
                            @break
                    @endswitch
                @endforeach
                </div>
            </div>
        @endif
        <!-- Section: Render Contents-End -->
    </div>

    <!-- Footer -->
    @include('layouts.footer-guest')
</body>
</html>