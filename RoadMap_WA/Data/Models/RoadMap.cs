using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Models
{
    public class RoadMap
    {
        public int Id { get; set; }
        public int CategoryId { get; set; }
        public virtual RMCategory RMCategory { get; set; }
        public bool isFavorite { get; set; }

        // Реализация класса

        public RoadMap Parent { get; set; }
        public string Data { get; set; }
        public List<RoadMap> Children { get; set; }

        public RoadMap(string Data)
        {
            this.Parent = null;
            this.Data = Data;
            this.Children = new List<RoadMap>();
        }
        /// <summary>
        /// Добавить ребёнка в текущий Node
        /// </summary>
        /// <param name="Data"></param>
        public void AddNode(string Data)
        {
            var Child = new RoadMap(Data);
            Child.Parent = this;
            Children.Add(Child);
        }

        /// <summary>
        /// Спуститься на слой ниже в N-ого ребёнка
        /// </summary>
        /// <param name="n"></param>
        public void LayerDown(int n)
        {
            this.Parent = this.Children[n];
            this.Data = this.Children[n].Data;
            this.Children = this.Children[n].Children;
        }

        /// <summary>
        /// Подняться на слой вверх
        /// </summary>
        public void LayerUp()
        {
            this.Children = this.Parent.Children;
            this.Data = this.Parent.Data;
            this.Parent = this.Parent.Parent;
        }
    }
}
