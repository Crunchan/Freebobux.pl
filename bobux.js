// bobux.js

// Funkcja inicjalizująca portfel Bobux z wartością początkową 200, jeśli jeszcze nie istnieje
function initializeBobuxWallet() {
    if (!localStorage.getItem("bobuxWallet")) {
        localStorage.setItem("bobuxWallet", 200); // Ustawienie domyślnej wartości Bobuxów
    }
    updateBobuxDisplay();
}

// Funkcja do wyświetlania aktualnej liczby Bobuxów w portfelu
function updateBobuxDisplay() {
    const walletElement = document.getElementById("bobuxWallet");
    if (walletElement) {
        walletElement.textContent = localStorage.getItem("bobuxWallet");
    }
}

// Funkcja do aktualizacji liczby Bobuxów
function updateBobuxAmount(amount) {
    const currentAmount = parseInt(localStorage.getItem("bobuxWallet")) || 0;
    const newAmount = Math.max(0, currentAmount + amount); // Bobuxy nie mogą być poniżej zera
    localStorage.setItem("bobuxWallet", newAmount);
    updateBobuxDisplay();
}

// Wywołanie inicjalizacji przy załadowaniu skryptu
initializeBobuxWallet();
