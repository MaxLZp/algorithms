def selection_sort(array):
    sorted = 0
    max = len(array)
    while sorted < max:
        for i in range(sorted, max):
            if array[i] < array[sorted]:
                array[i], array[sorted] = array[sorted], array[i]
        sorted += 1

    return array

print(selection_sort([1,5,3,7,3,8]))