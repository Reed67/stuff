#!/usr/bin/env python
# -*- coding: utf-8 -*-
import sys
import os
import getpass


class FileHandler(object):
    def __init__(self, fileName):
        self.fileName = fileName
    def fileReader(self, mode='r'):
        self.f = open(self.fileName, mode)
        return self.f
    def fileWriter(self, options):
        self.f.write(options)
    def fileCloser(self):
        self.f.close()

class VhostConfig(object):
    def __init__(self):
        self.options = dict()
        self.options['HomeVhostPath'] = 'Path_to_Apache_Vhost_File_on_Home'
        self.options['DataVhostPath'] = 'Path_to_Vhost_on_Data'
        self.options['ProjectsPath'] = 'Path_to_Projects'
    def get(self, key):
        return self.options.get(key, False)
    def set(self, key, option):
        self.options[key] = option

class Setup(object):
	def initVhostConfig(self, user, vhost):
		self.vhostconfig = VhostConfig()
		self.vhostconfig.set('HomeVhostPath', '/home/'+user+'/.apache2/')
		self.vhostconfig.set('DataVhostPath', '/data/'+user+'/apache2/var/www/vhosts/')
		self.vhostconfig.set('ProjectsPath', '/data/'+user+'/Projects/')
	
	def setupDirs(self,vhost):
		os.makedirs(self.vhostconfig.get('DataVhostPath')+vhost+'/log')
		os.makedirs(self.vhostconfig.get('ProjectsPath')+vhost+'/httpdocs')
		
	def setupFiles(self, user, vhost, port):
		filehandler = FileHandler(self.vhostconfig.get('HomeVhostPath')+'sites-available/'+vhost)
		filehandler.fileReader('w')
		filehandler.fileWriter(
		'NameVirtualHost *:'+port+os.linesep+
		'<VirtualHost *:'+port+'>'+os.linesep+
		'    DocumentRoot /data/'+user+'/apache2/var/www/vhosts/'+vhost+'/httpdocs'+os.linesep+
		'    <Directory /data/'+user+'/apache2/var/www/vhosts/'+vhost+'/httpdocs>'+os.linesep+
		'        Options -All +ExecCGI +FollowSymLinks'+os.linesep+
		'        AllowOverride All'+os.linesep+
		'        Order allow,deny'+os.linesep+
		'        allow from all'+os.linesep+
		'    </Directory>'+os.linesep+   
		'    ErrorLog /data/'+user+'/apache2/var/www/vhosts/'+vhost+'/log/error.log'+os.linesep+
		'    CustomLog /data/'+user+'/apache2/var/www/vhosts/'+vhost+'/log/access.log combined'+os.linesep+  
		'    ServerSignature On'+os.linesep+
		'</VirtualHost>'
		)
		filehandler.fileCloser()
		
		filehandler = FileHandler(self.vhostconfig.get('DataVhostPath')+vhost+'/log'+'/error.log')
		filehandler.fileReader('w')
		filehandler.fileCloser()
		
		filehandler = FileHandler(self.vhostconfig.get('HomeVhostPath')+'ports.conf')
		filehandler.fileReader('a')
		filehandler.fileWriter('Listen '+port+' #'+vhost+os.linesep)
		filehandler.fileCloser()
		
	def createTestPhp(self, vhost):
		filehandler = FileHandler(self.vhostconfig.get('ProjectsPath')+vhost+'/httpdocs/'+'index.php')
		filehandler.fileReader('w')
		filehandler.fileWriter('<?php'+os.linesep+'phpinfo();')
		filehandler.fileCloser()
		
	def setupSymLinks(self, vhost):	
		src = self.vhostconfig.get('ProjectsPath')+vhost+'/httpdocs'
		dst = self.vhostconfig.get('DataVhostPath')+vhost+'/httpdocs'
		os.symlink(src, dst)
		src = self.vhostconfig.get('HomeVhostPath')+'sites-available/'+vhost
		dst = self.vhostconfig.get('HomeVhostPath')+'sites-enabled/'+vhost
		os.symlink(src, dst)

class Main(object):
	def __init__(self):
		vhost = sys.argv[1]
		port = sys.argv[2]
		user = getpass.getuser()
		if ' #'+vhost in open('/home/'+user+'/.apache2/ports.conf').read():
			print "Vhost schon vorhanden!"
			sys.exit(0)
		if 'Listen '+port in open('/home/'+user+'/.apache2/ports.conf').read():
			print "Port schon vorhanden!"
			sys.exit(0)
		setup = Setup()
		setup.initVhostConfig(user, vhost)
		setup.setupDirs(vhost)
		setup.setupFiles(user, vhost, port)
		setup.setupSymLinks(vhost)
		setup.createTestPhp(vhost)
		os.system('unister-apache2 restart')

main = Main()

