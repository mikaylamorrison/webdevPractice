#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";

print <<"HTML";
<!DOCTYPE html>
<head>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<title>CPS530: Lab 7 (Mikayla M.)</title>
</head>
<body>
<h1 style="font-family: 'Playfair Display', serif; 
            font-size: 100px;
            font-weight: bold; 
            text-align: center;
            color: #fbd5ce;">This is my first Perl program
</h1>
</body>
</html>
HTML
