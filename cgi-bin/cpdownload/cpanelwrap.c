/* cpanel12 - cpanelwrap.c                  Copyright(c) 1997-2006 cPanel, Inc.
                                                           All Rights Reserved.
 copyright@cpanel.net                                         http://cpanel.net
 This code is subject to the cPanel license. Unauthorized copying is prohibited */

#include <sys/types.h>
#include <unistd.h>
#include <errno.h>
#include <stdio.h>
int main(int argc, char *argv[]) {
	char *prog_argv[1];
	prog_argv[0] = NULL;
	if( setreuid(UID,UID) != 0 ) {
         perror( "cpanelwrap" );
         return 255;
    }
	execv("./cpaneldownload.cgi",prog_argv);
}
