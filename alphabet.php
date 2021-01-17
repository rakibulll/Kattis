<?php
$alph = "abcdefghijklmnopqrstuvwxyz";
function llcs($pat, $alph)
{
  $m = strlen($pat);
  $n = strlen($alph);

  $lcs = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));

  for ($i = 0;$i <= $m; $i++)
  {
    for($j=0; $j <= $n; $j++)
    {
      if ($i == 0 || $j == 0)
      {
        $lcs[$i][$j] = 0;
      }
      elseif($pat[$i - 1] == $alph[$j - 1])
      {
        $lcs[$i][$j] = 1 + $lcs[$i-1][$j-1];
      }
      else
      {
        $lcs[$i][$j] = max($lcs[$i-1][$j], $lcs[$i][$j-1]);
      }
    }
  }
  return 26 - $lcs[$m][$n];
}
fscanf(STDIN, "%s", $pat);
echo llcs($pat, $alph);
