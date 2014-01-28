<!doctype html>
<title>file-api/js runner</title>
<style>
iframe { display:none }
ul { list-style:none; white-space:nowrap }
body > ul { padding-left:0 }
samp + span { position:absolute }
.fail { color:red; background:papayawhip }
</style>
<iframe></iframe>
<script>
 var iframe = document.querySelector('iframe');
 var tests;
 var current;
 document.onclick = function(e) {
   if (e.target.nodeName == 'BUTTON') {
     if (e.target.textContent == 'Skip') {
       opener.rr(undefined, 'Skipped');
     } else {
       if (tests && tests[current] && tests[current].nextSibling.nextSibling.textContent == 'Running...') {
         tests[current].nextSibling.nextSibling.textContent = 'N/A: Aborted';
         removeSkipButton(tests[current]);
       }
       current = 0;
       tests = e.target.nextSibling.getElementsByTagName('a');
       loadTest();
     }
   }
 }
 
 opener = {};
 opener.rr = function(passed, log) {
   tests[current].nextSibling.nextSibling.textContent = passed === undefined ? 'N/A: ' + log : (passed ? 'PASS' : (log ? 'FAIL: ' + log : 'FAIL'));
   if (passed !== undefined && !passed)
     tests[current].nextSibling.nextSibling.className = 'fail';
   removeSkipButton(tests[current]);
   current++;
   loadTest();
 }
 
 function loadTest() {
   if (tests[current]) {
     iframe.src = tests[current];
     tests[current].nextSibling.nextSibling.textContent = 'Running...';
     tests[current].nextSibling.nextSibling.className = '';
     tests[current].parentNode.appendChild(document.createTextNode(' '));
     tests[current].parentNode.appendChild(document.createElement('span'))
     tests[current].parentNode.lastChild.appendChild(document.createElement('button'))
     tests[current].parentNode.lastChild.firstChild.textContent = 'Skip';
   } else {
     iframe.src = 'about:blank';
   }
 }
 
 function removeSkipButton(link) {
   if (link.parentNode.childNodes.length == 5) {
     link.parentNode.removeChild(link.parentNode.lastChild);
     link.parentNode.removeChild(link.parentNode.lastChild);
   }
 }
</script>
<ul><li><button>file-api/js</button><?php 

function getDirectory( $path = '.' ){ 

    echo '<ul>';

    $ignore = array( 'non-automated' ); 

    $files = @scandir( $path );

    if ( $files ){
        natcasesort( $files );
     
        foreach ( $files as $file ){
         
            if( $file[0] !== '.' && !in_array( $file, $ignore ) ){ 
                 
                if( is_dir( "$path/$file" ) ){ 
                 
                    echo "<li><button>" . htmlspecialchars($file) . "</button>"; 
                    getDirectory( "$path/$file" ); 
                 
                } else { 
                 
                    if( preg_match( '/\.html?$/', $file ) && !preg_match( "/^\d\d\d-/", $file ) )
                        echo "<li><a href=\"" . htmlspecialchars("$path/$file") . "\">" . htmlspecialchars($file) . "</a> <samp></samp>"; 
                 
                } 
             
            } 
         
        }
    }
    
    echo '</ul>';

}

getDirectory(".");

?></ul>
