import express from "express";
import cors from "cors";
import "./bootstrap"; // Se este arquivo é necessário, mantenha-o

const app = express();

// Permite que o servidor aceite requisições do localhost:3000
const corsOptions = {
    origin: "http://localhost:3000",
    allowedHeaders: ["Content-Type", "Authorization", "X-CSRF-TOKEN"],
};

// Use o middleware CORS com as opções configuradas
app.use(cors(corsOptions));

// Defina suas rotas aqui
app.get("/", (req, res) => {
    res.send("Servidor rodando com CORS configurado!");
});

// Configuração da porta do servidor
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});
