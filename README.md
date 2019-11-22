# unifyjs
Unify all js file in a single file and call in your page. It's works very well with AJAX.


Setting JSON FILE:
{
    "separate_files": [ --->> Insert in this array all JS file that you want join 
        "app_pag_01.js",
        "app_pag_02.js",
        "app_pag_03.js",
        "app_pag_04.js",
    ],
    "single_file": "app",    --->> Here is the name for new single file
    "single_pathFile": "js/",  --->> Here is path for new single file
    "separate_pathFile": "js/doc_app/",  --->> Here is path for old files
    "version_control": true, --->> true / false
    "version_root": "2.0", --->> Here is your root version
    "version": 0, --->> Here is your version. Ex. 2.0.0 (version-root + '.' + version)
    "debugger_js": false --->> true / false ---> true -> all files will be save in separete in our page, this way is easy for debugger JS.
}
