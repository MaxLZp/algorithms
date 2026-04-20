def binary_search(array, el):
    """Binary search algorithm"""
    low = 0
    high = len(array) - 1
    while low < high:
        mid = (high + low) // 2
        print(f'low: {low}; high: {high}; mid: {mid}')
        if array[mid] == el:
            return mid

        if el < array[mid]:
            high = mid - 1
        else:
            low = mid + 1

    return -1
print(f"{'*'*10}")
print(binary_search([0,1,2,3,4,5,6,7,8,9], 5))
print(binary_search([0,1,2,3,4,5,6,7,8,9], -1))



