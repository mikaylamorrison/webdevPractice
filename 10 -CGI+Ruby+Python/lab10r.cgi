#!/usr/bin/env ruby
require 'cgi'
cgi = CGI.new
city = cgi['city'].capitalize
state = cgi['state'].capitalize
country = cgi['country'].capitalize
imageURL = cgi['imageURL']

puts "Content-Type: text/html\n\n"
puts "<html><body style='text-align:center; background-color:#AEC3B0'>"
puts "<h1 style='color:#124559; font-size: 100px;'>#{city}, #{state}, #{country}</h1>"
puts "<img src='#{imageURL}' style='width:100%;height:auto;'>"
puts "</body></html>"
