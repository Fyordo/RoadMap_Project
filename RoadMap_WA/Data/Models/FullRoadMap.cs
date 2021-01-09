using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Models
{
    public class FullRoadMap
    {
        public FullRoadMap(string name, int categoryId, RMCategory rMCategory, List<RoadMapNode> nodes, bool isFavorite)
        {
            this.Name = name;
            this.CategoryId = categoryId;
            this.RMCategory = rMCategory;
            this.Nodes = nodes;
            this.IsPopular = isFavorite;
        }

        public FullRoadMap(string name, int categoryId, RMCategory rMCategory)
        {
            this.Name = name;
            this.CategoryId = categoryId;
            this.RMCategory = rMCategory;
            this.Nodes = new List<RoadMapNode>();
            this.IsPopular = false;
        }

        /// <summary>
        /// RoadMap name
        /// </summary>
        public string Name { get; set; }
        /// <summary>
        /// RoadMap CategoryID
        /// </summary>
        public int CategoryId { get; set; }
        /// <summary>
        /// RoadMap Category Type
        /// </summary>
        public RMCategory RMCategory { get; set; }
        /// <summary>
        /// All Nodes of current RoadMap
        /// </summary>
        public List<RoadMapNode> Nodes { get; private set; }
        /// <summary>
        /// Is this RoadMap popular
        /// </summary>
        public bool IsPopular { get; set; }
        /// <summary>
        /// Short RoadMap description
        /// </summary>
        public string ShortDesc { get; set; }
        /// <summary>
        /// Long RoadMap description
        /// </summary>
        public string LongDesc { get; set; }

        /// <summary>
        /// Get Node by ID
        /// </summary>
        /// <param name="ID"></param>
        /// <returns></returns>
        public RoadMapNode GetRMNode(int ID)
        {
            foreach (RoadMapNode node in this.Nodes)
            {
                if (node._Id == ID)
                {
                    return node;
                }
            }
            return null;
        }

        /// <summary>
        /// Add new Node to the Table
        /// </summary>
        /// <param name="node"></param>
        public void AddNode(RoadMapNode node)
        {
            this.Nodes.Add(node);
        }
    }
}
