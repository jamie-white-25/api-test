<h1>SGNL api test</h1>

## <h2>Setup</h2>

<p>This is using Laravel sail, so if you are using docker run ./vender/bin/sail for docker commands, E.g: ./vender/bin/sail php artisan key:gen.</p>
<ol>
    <li>Rename the .env.example to .env all configs should work out of the box</li>
    <li>Using docker and sail run ./vender/bin/sail up -d</li>
    <li>Generate the app key, using sail do ./vender/bin/sail php artisan key:gen</li>
    <li>install your composer packages, and if you are using sail do ./vender/bin/sail composer install</li>
    <li>To run the test use ./vender/bin/sail php artisan test</li>
</ol>

## <h2>Database</h2>

<p>Once the sail is up and running or you have made the necessary changes to the .env and you can run aritsan migrate --seed. This will seed the database with all the buildings, departments, and a default employee ("Julius Caesar")</p>

<h3>Employee Table</h3>
<p>The employee table has the columns, RFID, full_name. The RFID is a string with a max length of 32 chars, which has to be unique. The full_name is just a string</p>

<h3>Buildings Table</h3>
<p>The buildings table has the columns, name, and location which are strings</p>

<h3>Departments Table</h3>
<p>The departments table has the columns, name is a string</p>

<h3>Many to Many relationships</h3>

<h4>Employees_Deparments Table</h4>
<p>This is a pivot table for the many to many relationship, and this has a forgin key (id) for the empoyee and department. This allows many employee to be assigned to many departments, and the empoyee can be attach or detach from a department</p>

<h4>Deparments_Buildings Table</h4>
<p>This is a pivot table for the many to many relationship, and this has a forgin key (id) for the building and department</p>

## <h2>Tests</h2>

<p>There is a feature test file called getEmployeeTest, and this has 4 test inside. The first test will check the rfid will return the employee json. The second test checks if the json structure is correct, the third checks if the json matches the json of the employee in the database(Julius Caesar). The last test check the json if the rfid doesn't match any records, and returns the json structure specified in the test document</p>

## <h2>Api endpoint</h2>

<p>There is just one route which is a GET route and uses the show method on the Employee controller. This could be turned into apiResource for a RESTful resource.</p>
