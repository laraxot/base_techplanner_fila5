<<<<<<< .merge_file_tC0Xea
=======
<<<<<<< HEAD
SELECT ST_CONTAINS(@g,@p);
>>>>>>> .merge_file_Z6vKP6
---
title: "polygon mysql"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "polygon mysql"
issues: []
discussions: []
module: theme
topic: polygon-mysql
canonical: ../../../Themes/docs/shared-components/polygon_mysql.txt
status: stub
---

See canonical documentation: ../../../Themes/docs/shared-components/polygon_mysql.txt
<<<<<<< .merge_file_tC0Xea
=======
=======
SET @g = ST_GEOMFROMTEXT('POLYGON((11.0000000 46.0000000,11.0000000 45.0000000,13.0000000 45.0000000,13.0000000 46.0000000, 11.0000000 46.0000000))');
set @p = ST_GEOMFROMTEXT('POINT(12.2442554 45.5653223)');
SELECT ST_CONTAINS(@g,@p);
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_Z6vKP6
