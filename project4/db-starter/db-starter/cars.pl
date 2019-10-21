#!/usr/bin/perl -w --
# access_cars.pl
# A CGI program to illustrate using MySQL from Perl

# Get access to DBI

use DBI;
use CGI ":standard";
print header();
print start_html("CGI-Perl MySQL database access!!!");

my $dbh = DBI->connect("DBI:mysql:database=ISP_dtl29;host=db1.cs.uakron.edu:3306;user=dtl29;password=Pah8quei");

if (!$dbh) {
    print "Error connecting to database; $dbh->errstr\n";
} 


# Get and display the query

my $query = "SELECT * FROM Corvettes";
print "<p> <b> The query is: </b>", $query, "</p>";

# Build a statement object for a SELECT SQL command

my $sth = $dbh->prepare($query);

# Execute the statement

$sth->execute or 
    die "Error - unable to execute query: $dbh->errstr\n";

# Get a reference to the column names in the returned value and
#  display the column names as the first table row

print "<table> <caption> <h2> Query Results </h2> </caption>", 
      "<tr align = 'center'>";
my $col_names = $sth->{NAME};
foreach $field_name (@$col_names) {
    print "<th> $field_name </th>";
}
print "</tr>";

# Get the rows of the result and display them in the table

while (@result_rows = $sth->fetchrow_array) {
    print "<tr align = 'center'>";

    while ($#result_rows >= 0) {
        $field = shift @result_rows;
        print "<td>  $field </td>";
    }

    print "</tr>";
}

print "</table>";
$sth->finish;
$dbh->disconnect;


print end_html();


