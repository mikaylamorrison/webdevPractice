#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);
use File::Basename; 
$CGI::POST_MAX = 1024 * 5000; 
print "Content-type: text/html\n\n";

my $cgi = CGI->new;

my $firstName  = $cgi->param('firstName');
my $lastName   = $cgi->param('lastName');
my $address    = $cgi->param('address');
my $city       = $cgi->param('city');
my $postalCode = $cgi->param('postalCode');
my $province   = $cgi->param('province');
my $phone      = $cgi->param('phone');
my $email      = $cgi->param('email');
my $photo      = $cgi->param('photo');
my $errors = '';

if ($phone =~ /^\d{10}$/) {
} else {
    $errors .= "Phone number must be 10 digits and contain only numbers. ";
}

if ($postalCode =~ /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/) {
} else {
    $errors .= "Postal code must be in the format L0L 0L0. ";
}

if ($email =~ /^[\w\.\-]+\@[\w\.\-]+\.[a-zA-Z]{2,4}$/) {
} else {
    $errors .= "Invalid email address format. ";
}

my $safe_filename_characters = "a-zA-Z0-9_.-"; 
my $upload_dir = "path to upload directory here"; 
my $query = new CGI; 
my $filename = $query->param("picture"); 
if ( !$filename ) { print $query->header ( ); print "There was a problem uploading your picture (try a smaller file)."; exit; } 
my ( $name, $path, $extension ) = fileparse ( $filename, '\..*' ); 
$filename = $name . $extension; 
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_filename_characters]//g; 

if ( $filename =~ /^([$safe_filename_characters]+)$/ ) { $filename = $1; } else { die "Filename contains invalid characters"; } 
my $upload_filehandle = $query->upload("picture"); 

open (UPLOADFILE, ">$upload_dir/$filename") or die "$!"; binmode UPLOADFILE; 
while ( <$upload_filehandle> ) { print UPLOADFILE; } 
close UPLOADFILE; 

print $query->header ( ); 


print <<"HTML";
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/Lab07/lab07.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>CPS530: Lab 7B (Mikayla M.)</title>
</head>
<body>
    <div>
        <header>
            <h1>Form Results</h1>
        </header>
        
        <main>
            <section>
                <h3>Thank you for registering, $firstName $lastName!</h3>
                <p>$errors</p>
                <p>Address: $address, $city, $province, $postalCode</p>
                <p>Phone Number: $phone</p>
                <p>Email: $email</p>
                <p><img src="url_to_upload_directory_here/$filename" alt="Uploaded picture" style="width:100px; height:auto; border:2px double #000000;"></p> 
            </section>
        </main>
    </div>
</body>
</html>
HTML
