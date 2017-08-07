<html>
    <head>
        <!-- Styles in file for separation & quick changes -->
        <style>
            body  {
                text-align: center;
            }
            table {
                width: 550px;
                margin-left: auto;
                margin-right: auto;
                font-size: 1.1em;
            }
            hr {
                width: 30%;
            }
            h2 {
                padding: 0px;
                margin-top: -20px;
            }
            h3 {
                margin-bottom: 4px;
            }
            #bottles, #cans {
                font-size: 20px;
            }
            
        </style>
    </head>
    
    <body>
        <br />
        <h1>Jimmy V's Grill &amp; Pub</h1>
        <h2>Beer List</h2>
        <hr />
        <h3>On Draft:</h3>
        <table>
            <?php foreach($draft as $beer) : ?>
            <tr>
                <td id="name"><?=$beer->getName()?></td>
                <td id="type"><?=$beer->getType()?></td>
                <td id="abv"><?=$beer->getAbv()?>% ABV</td>
                <td id="price"><i>$<?=$beer->getPrice()?></td></i>
            </tr>
            <?php endforeach; ?>
            
        </table>
        <br />
        <h3><?= ($bottles) ? 'Bottles' : ''?></h3>
        
        <div id="bottles">
            <?php 
                $lineLimit = 60; // Characters per line
                $count = 0;
                $bullet = false; // Flag for printing a bullet delimeter
                
                foreach($bottles as $beer) {
                    $count += strlen($beer->getName());
                    if ($count > $lineLimit) {
                        echo "<br />";
                        $count = 0;
                        $bullet = false;
                    }
                    
                    if ($bullet) {
                        echo " &bull; ";
                    }

                    echo $beer->getName();
                    
                    $bullet = true;
                }  
            ?>
        </div>
        
        <h3><?= ($cans) ? 'Cans' : ''?></h3>
        <div id="cans">
            <?php 
                $lineLimit = 60; // Characters per line
                $count = 0;
                $bullet = false; // Flag for printing a bullet delimeter
                
                foreach($cans as $beer) {
                    $count += strlen($beer->getName());
                    if ($count > $lineLimit) {
                        echo "<br />";
                        $count = 0;
                        $bullet = false;
                    }
                    
                    if ($bullet) {
                        echo " &bull; ";
                    }

                    echo $beer->getName();
                    
                    $bullet = true;
                }  
            ?>
        </div>
    </body>
    
</html>