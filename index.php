<?php
/**
 * Created by JetBrains PhpStorm.
 * User: shawn
 * Date: 10/9/13
 * Time: 11:01 AM
 */

$searchResults = "";
print "<!--\n";
print "GET == '".print_r($_GET,true)."'\n";
print "POST == '".print_r($_POST, true)."'\n";
print "-->\n";

if (isset($_GET['submit']))
{
  $wikiQuery = ParseForWiki($_GET);
  $diigoQuery = ParseForDiigo($_GET);;
  $evernoteQuery = ParseForEvernote($_GET);;
  $ddgQuery = ParseForDuckDuckGo($_GET);;

  $searchResults = <<<HTML
      <div id="searchresults">
          <hr/>

          <h3>KB Wiki</h3>
          <iframe id="kbwiki" src="http://codemastershawn.com/kb/index.php/Special:Search?$wikiQuery" class="searchresult"></iframe>

          <h3>Diigo</h3>
          <iframe id="dbdiigo" src="https://www.diigo.com/search?$diigoQuery" class="searchresult"></iframe>

          <h3>Evernote</h3>
          <iframe id="kbevernote" src="https://www.evernote.com/pub/dodgerwa/programming#b=f64edb5d-0d37-42ab-bf98-139200298101&$evernoteQuery" class="searchresult"></iframe>

          <h3>Duck Duck Go</h3>
          <iframe id="duckduckgo" src="http://duckduckgo.com/$ddgQuery" class="searchresult"></iframe>
      </div>
HTML;
}

$formAction = $_SERVER['PHP_SELF'];

print <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Search my knowledge bases</title>
    <link rel="stylesheet" type="text/css" href="mysearch.css"/>
</head>
<body>
    <h2>My KB Search</h2>

    <form method="GET" action="$formAction">
        <input id="query" name="query" type="text"/>
        <input type="submit" name="submit" value="Search"/>
    </form>
$searchResults
</body>
</html>
HTML;

/**
 * @param $queryVars
 *
 * @return string
 */
function ParseForWiki($queryVars)
{
  $newQuery = ParseQuery($queryVars, "+");
  return "search=$newQuery&go=Go";
}

/**
 * @param $queryVars
 * @return string
 */
function ParseForDiigo($queryVars)
{
  $newQuery = ParseQuery($queryVars, "%20");
  return "what=$newQuery";
}

/**
 * @param $queryVars
 * @return string
 */
function ParseForEvernote($queryVars)
{
  $newQuery = ParseQuery($queryVars, "%2520");
  return "x=$newQuery";
}

// TODO: Add logic to parse query for generic search engine

/**
 * @param $queryVars
 * @return string
 */
function ParseForDuckDuckGo($queryVars)
{
  return "BADF00D";
}

/**
 * @param $queryVars
 * @param $separator
 *
 * @return string
 */
function ParseQuery($queryVars, $separator)
{
  $newQuery = "";
  foreach ($queryVars as $k => $v)
  {
    if ($k != "SUBMIT")
    {
      $newQuery = empty($newQuery) ? $v : $newQuery.$separator.$v;
    }
  }
  return $newQuery;
}
