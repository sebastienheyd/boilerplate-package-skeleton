# Skeleton for [sebastienheyd/boilerplate-packager](https://github.com/sebastienheyd/boilerplate-packager)

These files are used as a structure to generate a package with [sebastienheyd/boilerplate-packager](https://github.com/sebastienheyd/boilerplate-packager) create.

### Variables

When generating, variables are converted to their values. 
All variables must start with the tilde (~) symbol to be converted, e.g : `~vendor` &rarr; `sebastienheyd`

| Available variable |
|---|
| ~vendor |
| ~package |
| ~resource |
| ~author_name  |
| ~author_email |
| ~package_description |
| ~license |
| ~date |
| ~locale |

Modifiers are also available like studly caps or uppercase, see the table below. E.g. `~wd:package` &rarr; `Boilerplate Packager`

| Modifier | Description | e.g |
|---|---|---|
| ~uc:pl: | Uppercase all words and convert to plural with space as separator | event &rarr; Events |
| ~wd: | Uppercase all words with space as separator | my-package &rarr; My Package |
| ~uc: | Converts to StudlyCase | my-package &rarr; MyPackage |
| ~sc: | Converts to snake_case | my-package &rarr; my_package |
| ~pl: | Converts to plural | event &rarr; events |

### File moving and renaming

After the conversion of all variables, packager will rename files that are declared in [`packager.json`](packager.json)

**NB** you can use variables too in packager.json to rename files
