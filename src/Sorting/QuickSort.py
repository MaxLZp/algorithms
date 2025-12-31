def quick_sort(lst):
    if len(lst) <= 1:
        return lst
    
    pivot = len(lst) // 2
    left = []
    right = []
    for index, item in enumerate(lst):
        if index == pivot: 
            continue
        if item <= lst[pivot]:
            left.append(item)
        if item > lst[pivot]:
            right.append(item)
    
    return quick_sort(left) +[lst[pivot]] +  quick_sort(right)
    

print(quick_sort([2,7,4,6,5,3]))
    
    
    
    
    
def partition(array, low, high):
    pivot = array[high]
    i = low - 1

    for j in range(low, high):
        if array[j] <= pivot:
            i += 1
            array[i], array[j] = array[j], array[i]

    array[i+1], array[high] = array[high], array[i+1]
    return i+1

def quick_sort2(array, low=0, high=None):
    if high is None:
        high = len(array) - 1

    if low < high:
        pivot_index = partition(array, low, high)
        quick_sort2(array, low, pivot_index-1)
        quick_sort2(array, pivot_index+1, high)
    
array = [2,7,4,6,5,3]
quick_sort2(array)
print(array)





def quick_sort3(array, low=0, high=None):
    if high is None:
        high = len(array) - 1

    if low < high:
        
        pivot = array[high]  # pivot - последний
        pivot_index = low - 1  # индекс до которого значения меньше чем pivot
        for i in range(low, high):
            if array[i] <= pivot:   # если текущий эл-т меньше pivota: увелич.индекс pivota
                pivot_index += 1
                tmp = array[pivot_index]
                array[pivot_index] = array[i]
                array[i] = tmp
        
        pivot_index += 1
        tmp = array[pivot_index]
        array[pivot_index] = array[high]
        array[high] = tmp
       
                
        quick_sort3(array, low, pivot_index - 1)
        quick_sort3(array, pivot_index + 1, high)
        
        return array
    

array = [3,5,2,4,3]
quick_sort3(array)
print(array)