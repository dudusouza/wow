php ..\vendor\doctrine\orm\bin\doctrine orm:convert-mapping --namespace="Model\\" --force  --from-database annotation ./model
php ..\vendor\doctrine\orm\bin\doctrine orm:generate-entities --update-entities="true" --generate-methods="true" ./model
pause