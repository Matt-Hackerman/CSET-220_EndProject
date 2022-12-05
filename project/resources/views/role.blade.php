<html>
<div class="grid-container">
    <h2>Role</h2>
    <h2 class="AL">Access Level</h2>
</div>
<div class="grid1">
    <label for="New_role">New Role</label>
    <form>
        <input type="text">
    </form>
</div>
<div class="grid">
    <label for="Access_level">Access Level</label>
    <form>
        <input type="text">
    </form>
</div>
<div class="grid2">
<div class="ok">
    <a href="">
        <button>Ok</button>
    </a>
</div>
<div class="cancel">
    <a href="">
        <button>Cancel</button>
    </a>
</div>
</div>
</html> 
<style>
   
    .grid-container {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
    }
    .grid-container>* {
        display: flex;
        justify-content: center;
        align-content: center;
        text-align: center;
        border: 1px solid white;
        padding: 5px;
        background-color:lightgrey;
    }
    .grid{
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        margin-top: 15px;
    }
    label{
        background-color: blue;
        text-align: center;
        border:2px solid black;
        border-top-right-radius: 10px;
        color: white;
        padding: 2%;
        padding-top: 20px;
        font-size: 25px;
    }
    .grid1{
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
        margin-top: 25%;
    }
    input{
        margin-top: 10px;
        margin-left: 10px;
        border: 7px solid blue;
        width: 250px;
        height: 50px;
    }
    .grid2{
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 10px;
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
        width: 150px;
        margin-top: -80px;
    }
    .ok{
        margin-left: 900px;
    }
    .cancel{
        margin-left: 30px;
    }
</style>