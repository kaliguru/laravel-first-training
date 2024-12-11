<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
    <h6>Logged In</h6>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>
    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #333;">Add a Post</h2>
        <form action="/create-post" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            <!-- Title -->
            <label for="title" style="font-size: 16px; color: #555;">Title:</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="Enter the title of your post"
                style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px; outline: none; width: 100%;"
                required>
            
            <!-- Body -->
            <label for="body" style="font-size: 16px; color: #555;">Body:</label>
            <textarea 
                id="body" 
                name="body" 
                rows="6" 
                placeholder="Write your post here..."
                style="padding: 10px; font-size: 14px; border: 1px solid #ddd; border-radius: 4px; outline: none; width: 100%;"
                required></textarea>
            
            <!-- Submit Button -->
            <button 
                style="background-color: #007BFF; color: white; padding: 10px 15px; font-size: 16px; border: none; border-radius: 4px; cursor: pointer; text-align: center;">
                Add Post
            </button>
        </form>
    </div>    
    <h1 style="text-align: center; color: #333;">Posts List</h1>

    @foreach ($posts as $post)
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">

        <!-- Post 1 -->
        <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
            <h2 style="color: #007BFF; margin-bottom: 10px;">{{$post['title']}} By {{$post->user->name}}</h2>
            <p style="color: #555; line-height: 1.6;">{{$post['body']}}</p>
            <p style="color: #ff0000; text-align:left;"><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}} " method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
            <p style="color: #999; font-size: 14px; text-align: right;">{{$post['created_at']}}</p>
        </div>
    @endforeach

    @else
    <div style="border:3px solid black;">
        <h2 style="color: red;">Signup</h2>
        <form action="/signup" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Signup</button>
        </form>
    </div>
    <div style="border:3px solid black;">
        <h2 style="color: red;">Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Signup</button>
        </form>
    </div>
    @endauth
    
</body>
</html>