#!/usr/bin/env python
# -*- coding: utf-8 -*-

import sys, traceback
import getpass
from os.path import exists
import os

user= getpass.getuser()

name = raw_input('Enter the Name of your desired virtual host, followed by [ENTER]: ')
port = raw_input('Enter the Port of your desired virtual host, followed by [ENTER]: ')
  
filename='/home/t.kroening/.apache2/ports.conf'

for line in open(filename, 'r'):
	if str(port) in line:	
		print 'Port already exists. Please choose a different name.'
		sys.exit(0)
		
		
if exists("/home/"+user+"/.apache2/sites-available/"+name) == True:
      print "File exists."
      sys.exit(0)


#vhosts = open('/home/t.kroening/.apache2/ports.conf', 'a')
#	print >> vhosts,("Listen")
#	vhosts.close()
#	print 'added config to /home/t.kroening/.apache2/ports.conf'

		
vhosts=open('/home/'+user+'/.apache2/ports.conf', 'a')
vhosts.write(os.linesep+"Listen "+str(port)+" #"+name)		
vhosts.close()


dateien=open("/home/"+user+"/.apache2/sites-available/"+name,'w')

dateien.write(os.linesep+"NameVirtualHost *:"+port)
dateien.write(os.linesep+"<VirtualHost *:"+str(port)+">")
dateien.write(os.linesep+"		DocumentRoot /data/"+user+"/apache2/var/www/vhosts/"+name+"/httpdocs")
dateien.write(os.linesep+" 	<Directory /data/"+user+"/apache2/var/www/vhosts/"+name+"/httpdocs>"+port)
dateien.write(os.linesep+"			Options -All +ExecCGI +FollowSymLinks")
dateien.write(os.linesep+"			AllowOverride All")
dateien.write(os.linesep+"			Order allow,deny")
dateien.write(os.linesep+"			allow from all")
dateien.write(os.linesep+"		</Directory>")
dateien.write(os.linesep+"	ErrorLog /data/"+user+"/apache2/var/www/vhosts/"+name+"/log/error.log")
dateien.write(os.linesep+"	CustomLog /data/"+user+"/apache2/var/www/vhosts/"+name+"/log/access.log combined")
dateien.write(os.linesep+"	ServerSignature On")
dateien.write(os.linesep+"</VirtualHost>")
dateien.close()


os.makedirs('/data/'+user+'/apache2/var/www/vhosts/'+name+'/log/')
os.makedirs('/data/'+user+'/apache2/var/www/vhosts/'+name+'/httpdocs')

errorfile = open('/data/'+user+'/apache2/var/www/vhosts/'+name+'/log/error.log', 'w')
errorfile.close()

indexphp = open('/data/'+user+'/apache2/var/www/vhosts/'+name+'/httpdocs/index.php', 'w')
indexphp.write('<?php'+os.linesep+'phpinfo();')
indexphp.close()

vhosts=open('/home/'+user+'/.apache2/ports.conf', 'a')
vhosts.write(os.linesep+'Listen '+str(port)+' #'+name)		
vhosts.close()

src = '/home/'+user+'/.apache2/sites-available/'+name
dst = '/home/'+user+'/.apache2/sites-enabled/'+name
os.symlink(src, dst)

os.system('unister-apache2 restart')
