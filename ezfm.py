#!/usr/bin/env python
# -*- coding:utf-8 -*-

"""
"""

def download_url_progress(url, filename):
    import sys
    import urllib2

    file_name = filename
    u = urllib2.urlopen(url)
    meta = u.info()
    file_size = int(meta.getheaders("Content-Length")[0])
    print("Downloading: {0} Bytes: {1}".format(url, file_size))

    f = open(file_name, 'wb')
    file_size_dl = 0
    block_sz = 8192
    while True:
        buffer = u.read(block_sz)
        if not buffer:
            break

        file_size_dl += len(buffer)
        f.write(buffer)
        p = float(file_size_dl) / file_size
        status = r"{0}  [{1:.2%}]".format(file_size_dl, p)
        status = status + chr(8)*(len(status)+1)
        #sys.stdout.write(status)
        print status

    f.close()

def main():
    url_base = "http://mod.cri.cn/eng/ez/morning/2013/"
    file_ext = ".mp3"

    from datetime import date
    today = date.today()
    filename = today.strftime("%m%d")

    print filename

    filename_full = 'ezm13' + filename + file_ext

    import os.path
    if os.path.exists(filename_full):
        print 'The File %s is already downloaded' % filename_full
        exit()

    url = url_base + filename_full
    try:
        download_url_progress(url, filename_full)
    except:
	exit()

if __name__ == '__main__':
    main()
