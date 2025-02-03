#!/usr/bin/python3
import cgi
form = cgi.FieldStorage()
city = form.getvalue('city', '').upper()
state = form.getvalue('state', '').upper()
country = form.getvalue('country', '').upper()
imageURL = form.getvalue('imageURL', '')

print("Content-Type: text/html\n")
print(f"<html><body style='text-align:center;'>")
print(f"<h1 style='color:#124559;'>%s, %s, %s</h1>" % (city, state, country))
print(f"<img src='{imageURL}' style='width:80%;border:15px solid #124559;'>")
print("</body></html>")
