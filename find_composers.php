                        <?php
                            $query = SELECT DISTINCT Composer_lastname FROM Composers;
                            
                            $Findcomposers = mysqli_query($con,$query);

                            foreach($Findcomposers as $Composer)
                            {
                                echo "<option value='$Composer'>$Composer</option>";
                            }
                        ?> 

<!-- 

Fetch composer names and musical forms from DB to populate pulldown list and create "other" value which you can enter manually!

Albeniz
Bach
Bartok
Beethoven
Busoni
Brahms
Chopin
Debussy
Franck
Haydn
Joplin
Mendelssohn
Mozart
Mussorgsky
Paderewski
Prokofiev
Rachmaninoff
Ravel
Rimski-Korsakov
Rubinstein
Saint-Saëns
Satie
Scarlatti
Schubert
Schumann
Scriabin
Shostakovich
Sibelius
Tchaikovsky
Liszt       

-->