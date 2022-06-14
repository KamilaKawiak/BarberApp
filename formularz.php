<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>Formularz php</title>
        <link rel="stylesheet" href="./CSS/formularz.css"/> 
    </head>
    <body>
        <form method="get" action="<?php htmlspecialchars(print($_SERVER['PHP_SELF'])); ?>">
            <table>
                
                <tr>
                    <td>Imię: </td>
                    <td><input type="text" name="firstname"></td>
                </tr>
                <tr>
                    <td>Nazwisko: </td>
                    <td><input type="text" name="lastname"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Telefon: </td>
                    <td><input type="telefon" name="telefon"></td>
                </tr>             

                <label for="Płeć">Płeć:</label>
                <select id="płeć" name="płec">                  
                    <option>Kobieta</option>
                    <option>Mężczyzna</option>
                    <option>Inna</option>
                </select>
                  

                <label for="Usługi">Usługi:</label>
                <select id="Usługi" name="usługi">
                  <optgroup label="Dla Pań">                 
                    <option>Strzyżenie</option>
                    <option>Farbowanie</option>
                    <option>Balejaż</option>
                    <option>Ombre</option>
                    <option>Sombre</option>
                    <option>Upięcie</option>
                    <option>Falowanie</option>
                    <option>Prostowanie</option>
                  </optgroup>
                  <optgroup label="Dla Panów">
                    <option>Strzyżenie</option>
                    <option>Stylizacja brody</option>
                    <option>Koloryzacja</option>
                  </optgroup>
                </select><br />
                <tr>
                    <td>Data: </td>
                    <td><input type="date" name="dataa"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Zarezerwuj"></td>
                </tr>
            </table>
        </form> 

        <?php
            $servername = "localhost";
            $username = "test";
            $password = "test";
            $db = "dbtest3";
    
            $connection = new mysqli($servername, $username, $password, $db);
    
            if ($connection->connect_error) {
                die("Connect failed : ".$connection->connect_error);
            }

            /*$sqlQuery = "CREATE DATABASE dbtest3";

            if($connection->query($sqlQuery) === TRUE) {
               print("Stworzono nową bazę");
            } else {
               print("Nie powiodło się tworzenie bazy: ".$connection->error);
            }*/

            $myQuery = "CREATE TABLE MyGuests (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                telefon INT(9),
                płeć VARCHAR(10),
                usługi VARCHAR(30),
                dataa DATE NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
    
        
           
    
          $querySelect = "SELECT id, firstname, lastname, email, telefon, płeć, usługi, dataa FROM MyGuests";
          $result = $connection->query($querySelect);
    
          $connection->close();
          
            if (isset($_GET['submit'])) {
                $firstname = $_GET['firstname'];
                $lastname = $_GET['lastname'];
                $email = $_GET['email'];
                $telefon = $_GET['telefon'];
                $płeć = $_GET['płeć'];
                $usługi = $_GET['usługi'];
                $dataa = $_GET['dataa'];
                $fail = 0;

                $emailPattern = "/[a-z0-9\.+_-]+@[a-z0-9]+(\.[a-z0-9]+)*\.[a-z]{2,3}/i";

                if (strlen($firstname) < 2) {
                    print('<p style="color:red;">Imie nie składa się z conajmniej 2 znaków. </p>');
                    $fail++;
                }

                if (strlen($lastname) < 2) {
                    print('<p style="color:red;">Nazwisko nie składa się z conajmniej 2 znaków. </p>');
                    $fail++;
                }

                if (strlen($telefon) < 9) {
                    print('<p style="color:red;">Numer telefonu powinnien się składać z 9 liczb. </p>');
                    $fail++;
                }

                if ($fail === 0) {
                    print("
                    <table>
                        <thead>
                            <th>Pole</th><th>Wartość</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Imię: </td>
                                <td>$firstname</td>
                            </tr>
                            <tr>   
                                <td>Nazwisko: </td>
                                <td>$lastname</td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td>$email </td>
                            </tr>
                            <tr>
                                <td>Telefon: </td>
                                <td>$telefon </td>
                            </tr>
                            <tr>
                                <td>Płeć: </td>
                                <td>$płeć </td>
                            </tr>
                            <tr>
                                <td>Usługi: </td>
                                <td>$usługi </td>
                            </tr>
                            <tr>
                                <td>Data: </td>
                                <td>$dataa </td>
                            </tr>
                        </tbody>
                    </table>
                    ");
                }
            }
        ?>
        <script src="formularz.js"></script>
    </body>
</html>