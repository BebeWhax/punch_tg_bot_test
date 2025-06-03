echo "🚀 Запуск docker-compose..."
docker-compose up --build -d

echo "⏳ Ожидание запуска контейнеров..."
sleep 10

echo "🧪 Выполнение миграций..."
docker exec -it app php artisan migrate --force

echo "✅ Готово! Проект доступен на http://localhost:8000"