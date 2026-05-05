"""
A* algorithm implementation.

Manhattan distance heuristic function.
No diagonal neighbors.
"""

class Point:
    """A Point on a Field(surface)"""
    def __init__(self, y: int, x: int, parent: Point = None, g = 0, h = 0, f = 0) -> None:
        self._y = y
        self._x = x
        self._parent = parent
        self._g = g
        self._h = h
        self._f = f

    def calc(self, end: Point) -> None:
        """Calculate point's g and f"""
        self._g = self._distance_to(end)
        self._f = self._g + self._h

    def equals(self, other: Point):
        """Two Point are equal if their coordinates are equal"""
        return self._x == other._x and self._y == other._y

    def get_neighbors(self) -> list[Point]:
        """
        Get Point's neighbors.

        Order: top, right, bottom, left.
        No diagonals.
        """
        return [
            Point(self._y - 1, self._x,     self, self._g),
            Point(self._y,     self._x + 1, self, self._g),
            Point(self._y + 1, self._x,     self, self._g),
            Point(self._y,     self._x - 1, self, self._g),
        ]

    def _distance_to(self, other: Point) -> int:
        """
        Heuristic function to calculate distance to ending point.

        "Manhattan" distance
        https://www.geeksforgeeks.org/data-science/manhattan-distance/
        https://cp-algorithms.com/geometry/manhattan-distance.html

        Args:
            other (Point): Point to calculate distance to.

        Returns:
            int: The distance.
        """
        return abs(self._x - other._x) + abs(self._y - other._y)
    
    def __repr__(self) -> str:
        return f'[({self._y}, {self._x}) => {self._g};{self._h};{self._f}]'


class PointsList:
    """List of Points"""
    def __init__(self) -> None:
        self.items = []
        
    def add(self, point: Point) -> None:
        """Add the Point to tha List"""
        self.items.append(point)
        
    def contains(self, point: Point) -> bool:
        """Check if the point is in the List"""
        return any(item for item in self.items if item.equals(point))
    
    def to_list(self) -> list[Point]:
        """Return a regular list[Point]"""
        return self.items[:]


class Field:
    """A surface that contains Points"""

    def __init__(self, width: int, height: int, walls: PointsList) -> None:
        self.width = width
        self.height = height
        self.walls = walls

    def has_point(self, point: Point) -> bool:
        """Check if the point belongs to the field

        Args:
            point (Point): Point to check

        Returns:
            bool: True is the Point belong to the field and false otherwise
        """
        return point._x >= 0 \
            and point._x < self.width \
            and point._y >= 0 \
            and point._y < self.height \
            and not self.walls.contains(point)


class PriorityList:
    """
    A Point's PriorityList
    Most 'suitable' Points moved to the top of the list
    """
    
    def __init__(self) -> None:
        self._items = []
        
    def add(self, point: Point) -> None:
        """
        Add the Point to the List.
        
        The point moves as high as possible based on the value of 'f'
        """
        if self._already_added(point):
            return
        
        self._items.append(point)
        i = 0
        while i > 0 and self._items[i-1].f < self._items[i].f:
            tmp = self._items[i - 1]
            self._items[i - 1] = self._items[i]
            self._items[i] = tmp
            i -= 1
            
    def is_empty(self) -> bool:
        """Check if the List is empty"""
        return len(self._items) == 0
    
    def pop(self) -> Point|None:
        """Pop point from top of the List"""
        popped = self._items[0] if self._items else None
        if popped:
            self._items = self._items[1:]
        return popped
    
    def _already_added(self, point: Point) -> bool:
        """Check if the Point is the list already"""
        return any(pt for pt in self._items if pt.equals(point))
    
    
class Astar:
    """Algorithm implementation"""
    
    def find(field: Field, start: Point, end: Point) -> list[Point]:
        """
        Find the shortest path

        Args:
            field (Field): Field to search a path on
            start (Point): Point to start from
            end (Point): Ending Point   

        Returns:
            list[Point]: shortest path
        """
        open_list = PriorityList()
        closed_list = PointsList()
        
        start.calc(end)
        open_list.add(start)
        
        while not open_list.is_empty():
            current = open_list.pop()
            found = end.equals(current)
            
            if closed_list.contains(current):
                continue
            
            closed_list.add(current)
            if found:
                break
            
            neighbors = current.get_neighbors()
            for neighbor in neighbors:
                if field.has_point(neighbor):
                    neighbor.calc(end)
                    open_list.add(neighbor)

        return Astar._build_path_list(closed_list)
    
    def _build_path_list(list: PointsList) -> list[Point]:
        """
        Build the shortest path from point in the closed_list
        Iterate using parent
        """
        result = []
        current = list.to_list()[-1]
        while current:
            result.insert(0, current)
            current = current._parent
            
        return result
    
    
if __name__ == "__main__":
    """
        s - start
        w - wall
        e - end
        + - path

        - - - - -
        s - w - e
        - - - - -
        
        
        Shortest Path:
        + + + + +
        s - w - e
        - - - - -
    
    """
    walls = PointsList()
    walls.add(Point(1, 2))
    field = Field(5, 3, walls)
    start = Point(1, 0)
    end = Point(1, 4)
    shortestPath = Astar.find(field, start, end)
    print(shortestPath)

    print('------------')
    """
        s - start
        w - wall
        e - end
        + - path

        - - - - e
        s - w - -
        - - - - -
        
        
        Shortest Path:
        + + + + e
        s - w - -
        - - - - -
    
    """
    walls = PointsList()
    walls.add(Point(1, 2))
    field = Field(5, 3, walls)
    start = Point(1, 0)
    end = Point(0, 4)
    shortestPath = Astar.find(field, start, end)
    print(shortestPath)

    print('------------')
    """
        s - start
        w - wall
        e - end
        + - path

        - - - - -
        s - w - -
        - - - - e
        
        
        Shortest Path:
        - - - - -
        s + w - -
        - + + + e
    """
    walls = PointsList()
    walls.add(Point(1, 2))
    field = Field(5, 3, walls)
    start = Point(1, 0)
    end = Point(2, 4)
    shortestPath = Astar.find(field, start, end)
    print(shortestPath)

    print('------------')
    """
        s - start
        w - wall
        e - end
        + - path

        - - - - -
        s - w - -
        - - - - e
        
        
        Shortest Path:
        + + + + +
        s - w - +
        - - w - e
    """
    walls = PointsList()
    walls.add(Point(1, 2))
    walls.add(Point(2, 2))
    field = Field(5, 3, walls)
    start = Point(1, 0)
    end = Point(2, 4)
    shortestPath = Astar.find(field, start, end)
    print(shortestPath)