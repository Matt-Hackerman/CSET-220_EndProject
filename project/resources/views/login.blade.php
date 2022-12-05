<html>
    <head>
      <marquee direction="right" 
          behavior="alternate"
          scrollamount="15" 
          class="blink">
          <h1>Please Login</h1>
          <title>Login</title>
      </marquee>
    </head>
    <body>
        <form action="/api/login" method="POST">
            @csrf
            <div class="whole">
                <div class="email">
                    <label for="email">Email</label>
                    <input class="" type="email" name="email" placeholder="Email: ">
                </div>
            </div> 
            <div class="password">
                <label for="password">Password</label>
                <input class="" type="password" name="password" placeholder="Password: ">

                <div class="ok">
                    <button class="" type="submit" name="login">Login</button> 
                </div>
                <div class="cancel">
                    <a href="Homepage.html">
                        <button>Cancel</button>
                    </a>
                </div>
            </div>
        </form>
    </body>
</html>

<style>
.email{
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    display: flex;
   margin-bottom: -40%;
   margin-top: -10%;
}
label{
    background-color: blue;
    text-align: center;
    border:2px solid black;
    border-top-right-radius: 10px;
    color: white;
    padding: 2%;
    width: 8%;
    height: 2%;
}
input{
    border: 5px solid blue;
    margin-left: 85px;
    margin-top: 25px;
    height: 5%;
}
.password{
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    display: flex;
    
    
}
.blink{
    animation: blinker 2s linear infinite; 
    color: blue;
}
@keyframes blinker {
    50% {
    opacity: 0;
    }
}    
button{
    background-color: #2E8B57;
    border-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 20px;
    width: 150px;
     

}
.cancel{
    position: fixed;
    bottom: 25px;
    left: 50%; 
}
.ok{
    position: fixed;
    bottom: 25px;
    left: 35%;
}
</style>
