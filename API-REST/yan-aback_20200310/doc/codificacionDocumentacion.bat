@echo off                 

dir /b *.html > lib
mkdir temp

for /f %%G in (lib) do ( 
 copy %%G temp\%%G
)

for /f %%G in (lib) do ( 
 type formato > %%G
)

for /f %%G in (lib) do ( 
	type temp\%%G >> %%G
)


pause