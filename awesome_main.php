<?php
require('header.php');

if(isset($_GET['remove'])){
    
/* Script that will remove the chosen category from the db */
    
$aweid = $_GET['aw_id'];
  
$mysql=connect_db();    
        
$sql="DELETE FROM planet_awesome WHERE awesome_id='$aweid'";
        
$result = $mysql->query($sql);    
    
if($result->num_rows > 0) {    
    
    // if there are categories
    
     header("Location: awesome_main.php");
    
}
    elseif($result->num_rows <= 0) {
        
        // if there are no categories
        
        header("Location: awesome_redirect.php");
    }
    
}  

    
echo "<div class='awesometext'> <p> Awesome planet </p> </div>";
        
        
        // Gets the function connect_db() and stores it in vector $mysql
        $mysql=connect_db();
        
        // query that selects everything from the table planet_awesome
        $sql="SELECT * FROM planet_awesome";
        
        //stores the result of the query and connection to the database in vector $result
        $result=$mysql->query($sql);
        
        // creates a split vector for looping trough the categories
        $split=0;
        
        ?>
        
        <!-- create a table -->
        <table class="awesomecategories">
        
        <?php
        
        while ($row=$result->fetch_assoc()){
            // creates a row for the table
            echo "<td class='awesomerow'>"
            // echoes the information from the db    
            . "<h4 id='cat_head'>" . $row['category'] . "</h4>"   
                
            . "<p id='cat_txt'>" . $row['definition'] . "</p>"
            
            . "<p>  <img src='./img/awesome_symbol/"  . $row['img'] . "'></p> "
            
            /* form for updateing the category */    
                
            . "<form method='get' action='awesome_update.php'>
            <input type='hidden' name='cat' value='".$row['category']."'/>
            <input type='hidden' name='def' value='".$row['definition']."'/>
            <input type='hidden' name='aw_id' value='".$row['awesome_id']."'/>
            <input type='image' name='update_awe' src='img/function_navigation/pen1.png' alt='Submit'/></form>"
                
                /* Form that removes a category  */
                
            . "<form method='get' action='awesome_main.php'>
            <input type='hidden' name='aw_id' value='".$row['awesome_id']."'/>
            <input type='image' value='delete' name='remove' onClick=\"return confirm('Are you sure?')\" src='img/function_navigation/delete.png' alt='Submit'/>
            </form></div></td>";
            
            
        
        
        // Counts the split 
        $split++;
        
        // when the split is equal to 6 (started from 0), then a new row will be created
        if($split%6==0){
            echo "</tr><tr>";
        }   // finishes the split
    
    }   //end of while-loop

// end of table
echo "</tr></table>";

            
   
  
        ?>
      
            
        <!-- Add a category -->
        <div id="editawesome">

       <a href="awesome_admin.php"><img src="img/function_navigation/add.png"></a> 

       

    
   </div>
   
     <script>
          
/* Scripts for the stars */
          
window.onload = function(){
        // Creating the Canvas
        var canvas = document.createElement("canvas"), 
            c = canvas.getContext("2d"),
            particles = {},
            particleIndex = 0,
            particleNum = 0.1;
        
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        canvas.id = "motion";
        document.body.appendChild(canvas);
        // Finished Creating Canvas
        
        // Setting color which is just one big square
        c.fillStyle = "#0D2A6D";
        c.fillRect(0,0,canvas.width,canvas.height);
        // Finished Color
        var y_fourth = Math.floor(canvas.height / 4);
        var y_second_fourth = Math.floor(y_fourth * 2);

        function Particle(){
            var random_x = Math.floor(Math.random() * (0)) + 1;
            var random_y = Math.floor(Math.random() * y_second_fourth + y_fourth) + 1;
            this.x = random_x;
            this.y = random_y;
            this.vx = Math.random() * 5 - 2;
            this.vy = Math.random() * 2 - 1;
            this.gravity = 0;
            particleIndex++;
            particles[particleIndex] = this;
            this.id = particleIndex;
            this.size = Math.random() * 6 - 2;
            this.color = "hsla(0,0%,"+parseInt(Math.random()*100, 0)+"%,1)";
            this.color2 = "hsla(360,100%,"+parseInt(Math.random()*100, 0)+"%,1)";
            this.color3 = "hsla(210,100%,"+parseInt(Math.random()*100, 0)+"%,1)";
            this.color_selector = Math.random() * 150 - 1;

        }
       
        Particle.prototype.draw = function(){
			this.x += this.vx;
			this.y += this.vy;
			this.vy += this.gravity;
			if(this.x > canvas.width || this.y > canvas.height){
				delete particles[this.id];
			}
			
			if(this.color_selector < 30 && this.color_selector > 10){
				c.fillStyle = this.color2;
			} else if(this.color_selector < 10) {
				c.fillStyle = this.color3;
			} else {
				c.fillStyle = this.color;
			}
			c.fillRect(this.x, this.y, this.size, this.size);
		};
        
        setInterval(function(){
            c.fillStyle = "#0D2A6D";
            c.fillRect(0,0,canvas.width,canvas.height);
            for (var i = 0; i < particleNum; i++){
                new Particle();
            }
            for(var i in particles){
                particles[i].draw();
            }
        }, 30);
    };
</script>
  
            
            <!--<div class="stars">
    </div>
 
<div class="space"></div>
  
   


   -->
 
 




