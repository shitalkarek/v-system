<?php
   session_start();
   if(!isset($_SESSION['userdata'])){
      header("location: ../");
      
   }
    
   $userdata = $_SESSION['userdata'];
   $groupsdata = $_SESSION['groupsdata'];
    
   if($_SESSION['userdata']['status']==0){
      $status ='<b style="color:red"> Not voted </b>';
   }
   else{
    $status='<b style="color:green"> Voted </b>';
   }
?>


<html>
<head>
    
    <title>VOTE FOR BEST PROJECT</title>
    <!-- <link rel="stylesheet" href="../css/stylesheet.css"> -->
</head>
<body>
      <style>
        body{
            /* background-image: url('../css/motion.gif'); */
            background-color: #28282b;
        }
        :root{
        --bs-dark-color: #28282b;
        --bs-dark-primary: #1c1c1c;
        --bs-main-color:#fff;
        --bs-primary-color:#c6c6c6;
        --secondary-color:#29a9fd;
        --bs-supporting-color: #C850C0;
        --waveB: #C6DAFC; 
      }
         #backbtn{
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            background-color: red;
            color: white;
            float:left;
            margin:10px;
         }
         #backbtn:hover{
            background-color:violet;
         }
         #logoutbtn{
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            background-color: red;
            color: white;
            float:right;
            margin:10px;

         }
         #logoutbtn:hover{
            background-color: violet;
         }


         #profile{
            background-color: white;
            width: 30%;
            padding:25px;
            float:left;


         }

         #Group{
            background-color: white;
            width: 60%;
            padding:25px;
            float:right;

         }

         #votebtn{
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            background-color: rgb(111, 111, 237);
            color: white;
            
         }
         #mainpanel{
            padding:10px;
         }
         #voted{
            padding: 10px;
            font-size: 15px;
            border-radius: 7px;
            background-color:blue;
            color: white;

         }
         h1{
            color: white;
            font-family: cursive;
         }
         .wvC{position:relative;bottom:0;width:100%;z-index:-1; left: -50%;} .wvS{  top:550px; position:relative} .wvS .waves{position:absolute;bottom:0; left: 620px; width:120%;height:60px;min-height:100px;max-height:150px} .wvH{position:relative ; margin-top: 8%; height:0;background:var(--waveB)} .plx > use{fill:var(--waveB);animation:waveMove 25s cubic-bezier(.55,.5,.45,.5) infinite} .plx > use:nth-child(1){opacity:.7;animation-delay:-2s;animation-duration:7s} .plx > use:nth-child(2){opacity:.5;animation-delay:-3s;animation-duration:10s} .plx > use:nth-child(3){opacity:.3;animation-delay:-4s;animation-duration:13s} .plx > use:nth-child(4){opacity:1;animation-delay:-5s;animation-duration:20s} .drK .wvH{background:var(--darkW)} .drK .plx > use{fill:var(--darkW)} @keyframes waveMove{0%{transform: translate3d(-90px,0,0)}100%{transform: translate3d(85px,0,0)}}
        

         
        </style>
    <div id ="mainsection">
        <center>
        <div id="headerSection">
        <a href ="../"><button id="backbtn">Back</button></a>
        <a href="logout.php"><button id="logoutbtn">Logout</button></a>
            
                <h1>Vote For The Best Project </h1>
            
    </div>
        </center>
    <hr>
    <div id="mainpanel">
    <div id="Profile">
        <center>
        <img src="../uploads/<?php echo $userdata ['photo']?>" height="100" width="100">
        </center> <br> <br>
        <b>Name:</b> <?php echo $userdata['name'] ?><br><br>
        <b>Roll number:</b> <?php echo $userdata['rollnumber'] ?><br><br>
        <b>Address:</b> <?php echo $userdata['address'] ?><br><br>
        <b>Status:</b> <?php echo $status ?><br><br>
    </div>

    <div id="Group">
        <?php 
         if($_SESSION['groupsdata']){
             for($i=0; $i<count($groupsdata); $i++){
                
                ?>
                <div>
                    <img style="float: right"src ="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                    <b>Group name :</b> <?php echo $groupsdata[$i]['name']?><br><br>

                    <b>Votes:</b> <?php echo $groupsdata[$i]['votes']?><br><br>
                    <form action ="../api/vote.php" method="POST">
                        <input type ="hidden" name ="gvotes" value="<?php  echo $groupsdata[$i]['votes']?>">
                        <input type ="hidden" name ="gid" value="<?php  echo $groupsdata[$i]['id']?>">
                        <?php 
                        if($_SESSION['userdata']['status']==0){
                            ?>
                             <input type ="submit" name= "votebtn" value="Vote" id ="votebtn">
                            <?php
                        }
                        else{
                            ?>
                            <button disabled type ="button" name= "votebtn" value="Vote" id="voted">Voted</button>
                            <?php

                        }
                        ?>
                    </form>

                </div>
                <hr>
                <?php
            }
        }
         else{

         }


        ?>
    </div>

    </div>
    

</div>


<div class="wvC"><div class="wvS"><svg class="waves" preserveAspectRatio="none" shape-rendering="auto" viewBox="0 24 150 28"><defs><path d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" id="wave-bg"></path></defs><g class="plx"><use x="48" xlink:href="#wave-bg" y="0"></use><use x="48" xlink:href="#wave-bg" y="3"></use><use x="48" xlink:href="#wave-bg" y="5"></use><use x="48" xlink:href="#wave-bg" y="7"></use></g></svg></div><div class="wvH"></div></div>

</body>
</html>