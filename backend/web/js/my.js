/**
 * Created by wm on 2015/3/12.
 */
function BrowseServer()
{
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = '../';  // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField;
    finder.popup();

    // It can also be done in a single line, calling the "static"
    // popup( basePath, width, height, selectFunction ) function:
    // CKFinder.popup( '../', null, null, SetFileField ) ;
    //
    // The "popup" function can also accept an object as the only argument.
    // CKFinder.popup( { basePath : '../', selectActionFunction : SetFileField } ) ;
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl )
{
    document.getElementById( 'xFilePath' ).value = fileUrl;

    $.post('/file/upload/',{src:fileUrl,_csrf:$("input[name=_csrf]").attr['value']},function(data){
        document.getElementById( 'img' ).src = data;
    })
}
