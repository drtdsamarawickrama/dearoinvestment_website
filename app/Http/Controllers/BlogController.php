<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\ToolBox;

class BlogController extends Controller
{
    public function loadBlogs(){
        $blogs = Blog::all();
        return view('moderator.blog-list', ['blogs' => $blogs]);
    }

    public function loadCreateBlog(){
        return view('moderator.blog-create');
    }

    public function createBlog(Request $request){
        $request->validate([
            'title' => 'required',
            'meta_description' => 'required',
            'og_image' => 'required',
            'article_type' => 'required',
        ]);

        if ($request->hasFile('og_image')) {
            // Process File
            $og_image_file = $request->file('og_image');
            $fileName = uniqid('blog_') . '.' . $og_image_file->getClientOriginalExtension();
            $og_image_file->storeAs('blog', $fileName);

            // Process Slug
            $slug = ToolBox::slugify(request('title').'-'.request('sub_title'));
            if(!Blog::isSlugAvailable($slug)){
                $slug = Blog::getUniqueSlug($slug, 1);
            }

            // Create Blog
            $blog = new Blog();
            $blog->title = request('title');
            $blog->sub_title = request('sub_title');
            $blog->meta_description = request('meta_description');
            $blog->og_image = $fileName;
            $blog->slug = $slug;
            $blog->article_type = request('article_type');
            $blog->status = 'DRAFT';
            $blog->save();

            if(isset($blog)){
                return redirect()->route('admin-blog-update-load', ['blog_id' => $blog->id]);
            }
        }

        back();
    }

    public function loadEditBlog($blog_id){
        $blog = Blog::find($blog_id);
        if(isset($blog)){
            $contents = BlogContent::where('blog_id', $blog->id)->orderBy('order_id', 'ASC')->get();
            return view('moderator.blog-create', ['blog' => $blog, 'contents' => $contents]);
        }else{
            return redirect()->route('admin-blogs-list-load');
        }
    }

    public function updateBlog(Request $request){
        $request->validate([
            'blog_id' => 'required',
            'title' => 'required',
            'meta_description' => 'required',
            'article_type' => 'required',
            'article_status' => 'required',
        ]);

        $blog = Blog::find(request('blog_id'));
        if(isset($blog)){
            // Process Slug
            $slug = ToolBox::slugify(request('title'));
            if(!Blog::isSlugAvailable($slug)){
                $slug = Blog::getUniqueSlug($slug, 1);
            }

            if ($request->hasFile('og_image')) {
                // Process File
                $og_image_file = $request->file('og_image');
                $fileName = uniqid('blog_') . '.' . $og_image_file->getClientOriginalExtension();
                $og_image_file->storeAs('blog', $fileName);

                $blog->update([
                    'title' => request('title'),
                    'sub_title' => request('sub_title'),
                    'meta_description' => request('meta_description'),
                    'og_image' => $fileName,
                    'slug' => $slug,
                    'article_type' => request('article_type'),
                    'status'=> request('article_status'),
                ]);
            }else{
                $blog->update([
                    'title' => request('title'),
                    'sub_title' => request('sub_title'),
                    'meta_description' => request('meta_description'),
                    'slug' => $slug,
                    'article_type' => request('article_type'),
                    'status'=> request('article_status'),
                ]);
            }
            
            return redirect()->route('admin-blog-update-load', ['blog_id' => $blog->id]);
        }
        return redirect()->route('admin-blogs-list-load');
    }

    public function createBlogContent(Request $request, $blog_id){
        $request->validate([
            'content_type' => 'required',
        ]);

        $blog = Blog::find($blog_id);

        if(isset($blog)){
            $content = array();
            switch(request('content_type')){
                case 'TITLE':
                    $request->validate([
                        'title' => 'required',
                    ]);

                    $content['content_type'] = 'TITLE';
                    $content['title'] = request('title');

                    $blogContent = new BlogContent();
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'TITLE';
                    $blogContent->content = json_encode($content);
                    $blogContent->order_id = BlogContent::getNextContentOrderId($blog_id);
                    $blogContent->save();
                    break;
                
                case 'PARAGRAPH':
                    $request->validate([
                        'para' => 'required',
                    ]);

                    $content['content_type'] = 'PARAGRAPH';
                    $content['paragraph'] = request('para');

                    $blogContent = new BlogContent();
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'PARAGRAPH';
                    $blogContent->content = json_encode($content);
                    $blogContent->order_id = BlogContent::getNextContentOrderId($blog_id);
                    $blogContent->save();
                    break;

                case 'LIST_BULLETS':
                    $request->validate([
                        'list_bulleted' => 'required',
                    ]);
                    $listString = request('list_bulleted');
                    $listItems = preg_split("/\r\n|\n|\r/", $listString);

                    $content['content_type'] = 'LIST_BULLETS';
                    $content['list_items'] = $listItems;

                    $blogContent = new BlogContent();
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'LIST_BULLETS';
                    $blogContent->content = json_encode($content);
                    $blogContent->order_id = BlogContent::getNextContentOrderId($blog_id);
                    $blogContent->save();
                    break;

                case 'LIST_NUMBERED':
                    $request->validate([
                        'list_numbered' => 'required',
                    ]);
                    $listString = request('list_numbered');
                    $listItems = preg_split("/\r\n|\n|\r/", $listString);

                    $content['content_type'] = 'LIST_NUMBERED';
                    $content['list_items'] = $listItems;

                    $blogContent = new BlogContent();
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'LIST_NUMBERED';
                    $blogContent->content = json_encode($content);
                    $blogContent->order_id = BlogContent::getNextContentOrderId($blog_id);
                    $blogContent->save();
                    break;
                    
                case 'IMAGE':
                    $request->validate([
                        'image_title' => 'required',
                        'image_file' => 'mimes:jpeg,jpg,png,gif|required|max:512',
                    ]);

                    if ($request->hasFile('image_file')) {
                        $image_file = $request->file('image_file');
                        $fileName = uniqid('blog_') . '.' . $image_file->getClientOriginalExtension();
                        $image_file->storeAs('blog', $fileName);
                        
                        $content['content_type'] = 'IMAGE';
                        $content['title'] = request('image_title');
                        $content['image'] = $fileName;

                        $blogContent = new BlogContent();
                        $blogContent->blog_id = $blog_id;
                        $blogContent->content_type = 'IMAGE';
                        $blogContent->content = json_encode($content);
                        $blogContent->order_id = BlogContent::getNextContentOrderId($blog_id);
                        $blogContent->save();
                    }
                    break;

                case 'PDF':
                    $request->validate([
                        'pdf_title' => 'required',
                        'pdf_file' => 'mimes:pdf|required',
                    ]);

                    if ($request->hasFile('pdf_file')) {
                        $image_file = $request->file('pdf_file');
                        $fileName = uniqid('pdf_') . '.' . $image_file->getClientOriginalExtension();
                        $image_file->storeAs('pdf', $fileName);
                        
                        $content['content_type'] = 'PDF';
                        $content['title'] = request('pdf_title');
                        $content['pdf'] = $fileName;

                        $blogContent = new BlogContent();
                        $blogContent->blog_id = $blog_id;
                        $blogContent->content_type = 'PDF';
                        $blogContent->content = json_encode($content);
                        $blogContent->order_id = BlogContent::getNextContentOrderId($blog_id);
                        $blogContent->save();
                    }
                    break;

                default:
                    break;
            }

            return redirect()->route('admin-blog-update-load', ['blog_id' => $blog->id]);
        }else{
            back();
        }
    }

    public function updateBlogContent(Request $request, $blog_id){
        $request->validate([
            'content_type' => 'required',
            'content_id' => 'required',
        ]);

        $blog = Blog::find($blog_id);
        echo "Blog is ".$blog_id;
        if(isset($blog)){
            $content = array();
            switch(request('content_type')){
                case 'TITLE':
                    $request->validate([
                        'title' => 'required',
                    ]);

                    $content['content_type'] = 'TITLE';
                    $content['title'] = request('title');

                    $blogContent = BlogContent::find(request('content_id'));
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'TITLE';
                    $blogContent->content = json_encode($content);
                    $blogContent->save();

                    break;
                
                case 'PARAGRAPH':
                    $request->validate([
                        'para' => 'required',
                    ]);

                    $content['content_type'] = 'PARAGRAPH';
                    $content['paragraph'] = request('para');

                    $blogContent = BlogContent::find(request('content_id'));
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'PARAGRAPH';
                    $blogContent->content = json_encode($content);
                    $blogContent->save();
                    break;
                
                case 'LIST_BULLETS':
                    $request->validate([
                        'list_bulleted' => 'required',
                    ]);
                    $listString = request('list_bulleted');
                    $listItems = preg_split("/\r\n|\n|\r/", $listString);

                    $content['content_type'] = 'LIST_BULLETS';
                    $content['list_items'] = $listItems;

                    $blogContent = BlogContent::find(request('content_id'));
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'LIST_BULLETS';
                    $blogContent->content = json_encode($content);
                    $blogContent->save();
                    break;

                case 'LIST_NUMBERED':
                    $request->validate([
                        'list_numbered' => 'required',
                    ]);
                    $listString = request('list_numbered');
                    $listItems = preg_split("/\r\n|\n|\r/", $listString);

                    $content['content_type'] = 'LIST_NUMBERED';
                    $content['list_items'] = $listItems;

                    $blogContent = BlogContent::find(request('content_id'));
                    $blogContent->blog_id = $blog_id;
                    $blogContent->content_type = 'LIST_NUMBERED';
                    $blogContent->content = json_encode($content);
                    $blogContent->save();
                    break;
                    
                case 'IMAGE':
                    $request->validate([
                        'image_title' => 'required',
                        'image_file' => 'mimes:jpeg,jpg,png,gif|required|max:512',
                    ]);

                    if ($request->hasFile('image_file')) {
                        $image_file = $request->file('image_file');
                        $fileName = uniqid('blog_') . '.' . $image_file->getClientOriginalExtension();
                        $image_file->storeAs('blog', $fileName);
                        
                        $content['content_type'] = 'IMAGE';
                        $content['title'] = request('image_title');
                        $content['image'] = $fileName;

                        $blogContent = BlogContent::find(request('content_id'));
                        $blogContent->blog_id = $blog_id;
                        $blogContent->content_type = 'IMAGE';
                        $blogContent->content = json_encode($content);
                        $blogContent->save();
                    }
                    break;

                case 'PDF':
                    $request->validate([
                        'pdf_title' => 'required',
                        'pdf_file' => 'mimes:pdf|required',
                    ]);

                    if ($request->hasFile('pdf_file')) {
                        $image_file = $request->file('pdf_file');
                        $fileName = uniqid('pdf_') . '.' . $image_file->getClientOriginalExtension();
                        $image_file->storeAs('pdf', $fileName);
                        
                        $content['content_type'] = 'PDF';
                        $content['title'] = request('pdf_title');
                        $content['pdf'] = $fileName;

                        $blogContent = BlogContent::find(request('content_id'));
                        $blogContent->blog_id = $blog_id;
                        $blogContent->content_type = 'PDF';
                        $blogContent->content = json_encode($content);
                        $blogContent->save();
                    }
                    break;

                default:
                    break;
            }

            return redirect()->route('admin-blog-update-load', ['blog_id' => $blog->id]);
        }else{
            back();
        }
    }

    public function moveUpBlogContent($blog_id, $content_id){
        $contentCurrent = BlogContent::find($content_id);
        if(isset($contentCurrent)){
            echo "Current page found. page id ".$contentCurrent->id." order ".$contentCurrent->order_id;
            $contentOnTop = BlogContent::where('blog_id', $contentCurrent->blog_id)->where('order_id', '<', $contentCurrent->order_id)->orderBy('order_id', 'DESC')->first();
            if(isset($contentOnTop)){
                echo "Page on top found";
                $contentIdTop = $contentOnTop->order_id;
                $contentOnTop->order_id = $contentCurrent->order_id;
                $contentOnTop->save();

                $contentCurrent->order_id = $contentIdTop;
                $contentCurrent->save();
            }
        }

        return redirect()->route('admin-blog-update-load', ['blog_id' => $blog_id]);
    }

    public function moveDownBlogContent($blog_id, $content_id){
        $contentCurrent = BlogContent::find($content_id);
        if(isset($contentCurrent)){
            $contentBelow = BlogContent::where('blog_id', $contentCurrent->blog_id)->where('order_id', '>', $contentCurrent->order_id)->orderBy('order_id', 'ASC')->first();
            if(isset($contentBelow)){
                $contentIdBelow = $contentBelow->order_id;
                $contentBelow->order_id = $contentCurrent->order_id;
                $contentBelow->save();

                $contentCurrent->order_id = $contentIdBelow;
                $contentCurrent->save();
            }
        }

        return redirect()->route('admin-blog-update-load', ['blog_id' => $blog_id]);
    }

    public function deleteBlogContent($blog_id, $content_id){
        $contentCurrent = BlogContent::find($content_id);
        $contentCurrent->delete();

        return redirect()->route('admin-blog-update-load', ['blog_id' => $blog_id]);
    }
    
    public function readBlogPostByPublic($slug){
        $blog = Blog::where('slug', $slug)->first();
        
        if(isset($blog)){
            if($blog->status == 'PUBLISHED'){
                $contents = BlogContent::where('blog_id', $blog->id)->orderBy('order_id', 'ASC')->get();
                return view('blog-post', ['blog' => $blog, 'contents' => $contents]);
            }else{
                $data = array();
                $data['error'] = 'Sorry! the page was not found';
                $data['description'] = 'You have requested a blog post. Unfortunately the blog post you requested is not published yet.';
            }
            
        }else{
            $data = array();
            $data['error'] = 'Sorry! the page was not found';
            $data['description'] = 'You have requested a blog post. Unfortunately the blog post you requested was not found.';
        }
        return response()->view('errors.404', $data, 404);
    }

    public function loadFinancialReports(){
        $annualFinancialReports = Blog::where('article_type', 'ANNUAL_REPORT')->where('status', 'PUBLISHED')->get();
        $quarterlyFinancialReports = Blog::where('article_type', 'QUARTERLY_REPORT')->where('status', 'PUBLISHED')->get();
        return view('info.general-financial-reports', ['annual_reports' => $annualFinancialReports, 'quarterly_reports' => $quarterlyFinancialReports]);
    }

    public function loadGeneralArticles(){
        $generalArticles = Blog::where('article_type', 'GENERAL_ARTICLE')->where('status', 'PUBLISHED')->get();
        return view('info.general-news-latest', ['general_articles' => $generalArticles]);
    }
}
