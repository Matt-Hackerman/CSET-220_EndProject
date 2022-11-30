<html>
    <head>
        <title>Login</title>
    </head>

    <body>
        
        <div class="">
            @csrf
            <form action="/api/login" method="POST">
                <input class="" type="email" name="email" placeholder="Email: ">
                <input class="" type="password" name="password" placeholder="Password: ">
                <button class="" type="submit" name="login">Login</button>  
            </form>
        </div>

    </body>
</html>