import pprint
import scipy
import scipy.linalg   # SciPy Linear Algebra Library
import  numpy as np



# A basic code for matrix input from user
  
# R = int(input("Enter the number of rows:"))
C = int(input("Enter the number of equations: \n"))


A = [[int(input(f"Enter equation {y+1} column {x+1} \n")) for x in range (C)] for y in range(C)]

# Initialize matrix
# A = []
# print("Enter the entries rowwise:")
  
# For user input
# for i in range(R):          # A for loop for row entries
#     a =[]
#     for j in range(C):      # A for loop for column entries
#          a.append(int(input()))
#     A.append(a)



# one-liner logic to take input for rows and columns
# mat = [[int(input()) for x in range (C)] for y in range(R)]


# A = np.array([ [7, 3, -1, 2], [3, 8, 1, -4], [-1, 1, 4, -1], [2, -4, -1, 6] ])
# Getting the script for pivot table, lower limit and upper limit
P, L, U = scipy.linalg.lu(A)

# print("I want to know additional functions\n")
# print(scipy.linalg.lu(A))

print('\\nn Equation \n\n')

print(A)

print('\nPivot Table\n\n')
print(P)

print('\nUpper Triangle\n\n')
print(U)

print('\nLower Triangle\n\n')
print(L)
