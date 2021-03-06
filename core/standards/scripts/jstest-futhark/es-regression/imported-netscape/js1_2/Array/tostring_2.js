/* The contents of this file are subject to the Netscape Public License
 * Version 1.0 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/NPL/
 * 
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 * 
 * The Original Code is Mozilla Communicator client code, released March
 * 31, 1998.
 * 
 * The Initial Developer of the Original Code is Netscape Communications
 * Corporation. Portions created by Netscape are Copyright (C) 1998
 * Netscape Communications Corporation. All Rights Reserved.
 * 
 */
/**
    File Name:          tostring_2.js
    Reference:          http://scopus.mcom.com/bugsplat/show_bug.cgi?id=114564
    Description:        toString in version 120


    Author:             christine@netscape.com
    Date:               15 June 1998
*/

    var SECTION = "Array/tostring_2.js";
    var VERSION = "JS_12";
    startTest();
    var TITLE   = "Array.toString";

    writeHeaderToLog( SECTION + " "+ TITLE);

    var testcases = new Array();

    var a = [];

    var version;
    if ( !version ) {
        function version() { return 0; };
    }

    testcases[tc++] = new TestCase ( SECTION,
        "a.toString()",
        ( version() == 120 ? "[]" : "" ),
        a.toString() );

    testcases[tc++] = new TestCase ( SECTION,
        "String( a )",
        ( version() == 120 ? "[]" : "" ),
        String( a ) );

    testcases[tc++] = new TestCase ( SECTION,
        "a +''",
        ( version() == 120 ? "[]" : "" ),
        a+"" );

    test();

function test() {
    for ( tc=0; tc < testcases.length; tc++ ) {
        testcases[tc].passed = writeTestCaseResult(
                            testcases[tc].expect,
                            testcases[tc].actual,
                            testcases[tc].description +" = "+
                            testcases[tc].actual );

        testcases[tc].reason += ( testcases[tc].passed ) ? "" : "wrong value ";
    }
    stopTest();
    return ( testcases );
}
