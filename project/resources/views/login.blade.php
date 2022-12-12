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
            <label for="email">Email</label>
            <input class="" type="email" name="email" placeholder="Email: ">
            <br>
            <label for="password">Password</label>
            <input class="" type="password" name="password" placeholder="Password: ">
            <div class="click">
                <div class="ok">
                    <button class="" type="submit" name="login">Login</button> 
                </div>
                <div class="cancel">
                    <a href="/">
                        <button type="button">Cancel</button>
                    </a>
                </div>
            </div>
        </form>
    </body>
</html>

<style>

.blink{
    animation: blinker 2s linear infinite; 
    color: blue;
}
@keyframes blinker {
    50% {
    opacity: 0;
    }
}
html{
    text-align: center;
   justify-content: center;
   align-items: center;
}
label{
    background-color: blue;
    border-top-right-radius: 10px;
    border-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin-top: 3%;
    width: 7%;
    
}
input{
    border: 5px solid blue;
    margin-left: 85px;
    margin-top: 25px;
    height: 5%;
}
button{
    background-color: #2E8B57;
    border-color: black;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    margin-top: 10%;
    width: 100px;
}
.click{
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    gap: 2%;

}
