<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Processor</title>
    <style>
        body { 
        font-family: Arial, sans-serif; 
        margin: 20px;
        background-color: #87CEFA;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        }
        .container { 
        background-color:#00BFFF;
        padding: 2rem;
        max-width: 500px; 
        margin: auto; 
        border-radius: 50px;
        box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        }
        textarea { 
        width: 100%; 
        height: 100px; 
        }
        button { 
        margin-top: 10px; 
        border-radius: 50px;
        background-color: #32CD32;
        transition: background-color 0.3s ease;
        cursor: pointer;
        }
        button:hover {
            background-color:#90EE90;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Text Processor</h2>
        <form method="post">
            <textarea name="text" placeholder="Masukkan teks di sini..."></textarea><br>
            <select name="type">
                <option value="uppercase">Uppercase</option>
                <option value="lowercase">Lowercase</option>
                <option value="word_count">Jumlah Kata</option>
            </select><br>
            <button type="submit">Proses</button>
        </form>
        <h3>Hasil:</h3>
        <p>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                function processText($text, $type) {
                    switch ($type) {
                        case 'uppercase':
                            return strtoupper($text);
                        case 'lowercase':
                            return strtolower($text);
                        case 'word_count':
                            return str_word_count($text);
                        default:
                            return 'Invalid type';
                    }
                }
                
                $text = $_POST['text'] ?? '';
                $type = $_POST['type'] ?? '';
                echo processText($text, $type);
            }
            ?>
        </p>
    </div>
</body>
</html>
