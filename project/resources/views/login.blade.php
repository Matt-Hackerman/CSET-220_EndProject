<html>
    <head>
        <marquee direction="right" 
        behavior="alternate"
        scrollamount="15" 
        class="blink">
        <h1>Please Login</h1>
    </marquee>
    </head>

<label for="email" class="email" >
    email
</label>
<input type="text" name="email" />
<br><br>
<label for="password">
    Password
</label>
<input type="text" name="password" />
<div class="click">
<div class="ok">
    <a href="">
        <button>Ok</button>
    </a>
</div>
<div class="cancel">
    <a href="Homepage.html">
        <button>Cancel</button>
    </a>
</div>
</div>
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

</style>