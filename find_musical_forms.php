                        <?php

                            $query = SELECT DISTINCT Musical_Form FROM Songs;
                            
                            $Findforms = mysqli_query($con,$query);

                            foreach($Findforms as $Form)
                            {
                                echo "<option value='$Form'>$Form</option>";
                            }
                        ?> 

<!-- 

Fetch composer names and musical forms from DB to populate pulldown list and create "other" value which you can enter manually!

Air
Arabesque
Bagatelle
Ballade
Barcarolle
Berceuse
Canon
Cantata
Caprice
Concerto
Etude
Fantasia
Fugue
Impromptu
March
Mazurka
Minuet
Nocturne
Partita
Polonaise
Prelude
Rhapsody
Rondo
Scherzo
Sonata
Sonatina
Suite
Symphonic poem
Tango
Tocatta
Variations
Waltz
            
-->