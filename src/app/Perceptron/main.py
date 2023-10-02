import numpy as np


class Perceptron:
    def __init__(self, n):
        self.pesos = np.random.randn(n)
        self.n = n

    def propagacion(self, entradas):
        self.entradas = entradas
        self.salida = 1 * (self.pesos.dot(entradas) > 0)

    def actualizacion_coef(self, alfa, salidad):
        for i in range(0, self.n):
            self.pesos[i] = (
                self.pesos[i] + alfa * (salidad - self.salida) * self.entradas[i]
            )
